<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Input;
class LearnController extends Controller
{
      public function index(){

 	$learns = DB::table('learns')->select('id','fname','lname', 'cno','email','address')->get();

    return view('learn.index', ['learns' => $learns]);
        }  
 


    public function create()
    {
        return view('learn/create');
    }

public function storeadd(Request $request){
$data=Input::except(array('csrf_token'));
 
$rule = array('fname' =>'required|min:3' ,
              'lname' =>'required|min:3' ,
              'cno' =>'required|digits_between:10,10' ,
              'email'=>'required|email|unique:learns', 
                'address' =>'required|max:250');
                

$message = array('fname.required' =>' First Name is required' ,
                 'fname.min' =>' First Name must be at least 3 character',
                 'lname.required' =>' Last Name is required' ,
                 'lname.min' =>' last Name must be at least 3 character',
                  'cno.required'=>'Number is required',
                   'cno.digits_between'=>'Contact Number must be 10 digit',
                   'address.required'=>'Address is required');

$validator=Validator::make($data,$rule,$message);
if ($validator->fails()) {
  return Redirect::to('/create')->withErrors($validator)->withInput();
}else
{

$a = $request->input('fname');
$b = $request->input('lname');
$c = $request->input('cno');
$d = $request->input('email');
$e = $request->input ('address');

DB::table('learns')->insert(array('fname' => $a, 'lname' => $b , 'cno' => $c, 'email' => $d, 'address' => $e));

return redirect('/learn');  
}
}


public function edit($id)
    {
      $data=Input::except(array('csrf_token'));

      $learns = DB::table('learns')->where('id', $id)->get();
//DB::table('users')

        return view('learn.edit', ['learns' => $learns]); 
      }

public function myupdate(Request $request){
$data=Input::except(array('csrf_token'));
 
$rule = array('fname' =>'required|min:3' ,
              'lname' =>'required|min:3' ,
              'cno' =>'required|digits_between:10,10' ,
              'email'=>'required|email', 
                'address' =>'required|max:250');
                

$message = array('fname.required' =>' First Name is required' ,
                 'fname.min' =>' First Name must be at least 3 character',
                 'lname.required' =>' Last Name is required' ,
                 'lname.min' =>' last Name must be at least 3 character',
                  'cno.required'=>'Number is required',
                   'cno.digits_between'=>'Contact Number must be 10 digit',
                   'address.required'=>'Address is required');

$validator=Validator::make($data,$rule,$message);
if ($validator->fails()) {
  return Redirect::to('/edit')->withErrors($validator)->withInput();
}else
{
$id= $request->input('id');
$a = $request->input('fname');
$b = $request->input('lname');
$c = $request->input('cno');
$d = $request->input('email');
$e = $request->input ('address');

DB::table('learns')->where('id', $id)->update(array('fname' => $a, 'lname' => $b , 'cno' => $c, 'email' => $d, 'address' => $e));
 
return redirect('/learn');  
}
}

public function mydelete(Request $request)
    {
    $id= $request->input('id');	
     DB::table('learns')->where('id', $id)->delete();


        return redirect('/learn'); 
      }
}
