<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');
Route::get('/profile', 'ProfileController@index');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');

Route::resource('employee-management', 'EmployeeManagementController');
Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

Route::resource('system-management/department', 'DepartmentController');
Route::post('system-management/department/search', 'DepartmentController@search')->name('department.search');

Route::resource('system-management/division', 'DivisionController');
Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

Route::resource('system-management/country', 'CountryController');
Route::post('system-management/country/search', 'CountryController@search')->name('country.search');

Route::resource('system-management/state', 'StateController');
Route::post('system-management/state/search', 'StateController@search')->name('state.search');

Route::resource('system-management/city', 'CityController');
Route::post('system-management/city/search', 'CityController@search')->name('city.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');

Route::get('avatars/{name}', 'EmployeeManagementController@load');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::group(['middleware' => 'auth'], function () {

//----------learn routes start----
Route::get('learn/', 'LearnController@index');
Route::get('/create', function () {
    return view('learn.create');
});
Route::get('/edit', function () {
    return view('learn.edit');
});
Route::get('/edit/{id}','LearnController@edit');
Route::post('/create','LearnController@storeadd');
Route::post('/edit','LearnController@myupdate');
Route::post('learn/','LearnController@mydelete');
Route::get('/test', function () {
    return view('learn.test');
});     

//----------learn routes end----

//----------jquery routes start----

Route::get('/jquery','JqueryController@jquery');
Route::post('/postjquery','JqueryController@postjquery');
Route::get('/readByAjax','JqueryController@readByAjax');
Route::post('/deleteByAjax','JqueryController@deleteByAjax');
Route::get('/editByAjax','JqueryController@editByAjax');
Route::post('/updateByAjax','JqueryController@updateByAjax');
Route::post('/alldeleteByAjax','JqueryController@alldeleteByAjax');
Route::get('/readByAjaxWs','JqueryController@readByAjaxWs');

//----------jquery routes end----
//Route::get('/dataform','DataformController@index');

//Route::get('/datatable','DatatablesController@getIndex');
//Route::get('/anyData','DatatablesController@anyData');
//----check buttons
//Route::resource('/datatable', 'UsersController')->name('datatables.data');


});//--------------auth end

