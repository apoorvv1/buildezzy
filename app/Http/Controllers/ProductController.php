<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
  public function index()
 {
 $products = DB::table('products')->select('id','name', 'details','email')->get();

        return view('ajax.index', ['products' => $products]);
        }  
}
