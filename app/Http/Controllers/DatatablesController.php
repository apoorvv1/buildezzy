<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Learn;
use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{
   public function getIndex()
{
    return view('datatables.index');
}

/**
 * Process datatables ajax request.
 *
 * @return \Illuminate\Http\JsonResponse
 */
    public function anyData()
    {
        $learns = Learn::select(['id', 'fname','lname','cno', 'email','address']);

        return Datatables::of($learns)// -> make (true);
            ->addColumn('action', function ($learn) {
                return '<a href="#edit-'.$learn->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            });
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }

}
