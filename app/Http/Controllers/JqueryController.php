<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HtmlServiceProvider;
use App\learn;
use Response;
use Datatables;
use DB;
use Validator;
use Redirect;
use Log;
use Illuminate\Support\Facades\Input;
class JqueryController extends Controller
{
    public function jquery(){

    	return view('jquery.jquery');

    }

/*---------------------------------ADD function---------------------------------------*/ 

     public function postjquery(Request $req){
if($req->ajax())
     		 {
     	$data=$req->all();
$i=$req->input('id');
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
					 //return response()->json($validator->errors(), 422);
                	return response::json(['success'=>false,'errors'=>$validator->errors()->toArray()]);
					}elseif ($i==0) {
            $a = $req->input('fname');
        $b = $req->input('lname');
        $c = $req->input('cno');
        $d = $req->input('email');
        $e = $req->input ('address');

        DB::table('learns')->insert(array('fname' => $a, 'lname' => $b , 'cno' => $c, 'email' => $d, 'address' => $e));
           
                //return back()
                  //  ->with('success','Record Added successfully.');
                  return response::json(['success'=>true]);
               
          }else{

$i= $req->input('id');
$a = $req->input('fname');
$b = $req->input('lname');
$c = $req->input('cno');
$d = $req->input('email');
$e = $req->input ('address');

DB::table('learns')->where('id', $i)->update(['fname' => $a, 'lname' => $b , 'cno' => $c, 'email' => $d, 'address' => $e]);

                return response::json(['success'=>true]);
            


                	}
            }	
        
			}
/*---------------------------------END ADD function---------------------------------------*/ 

			
/*---------------------------------Show Datatable function---------------------------------------*/	
			public function readByAjax(){
			$learns = DB::table('learns')->select('id','fname','lname', 'cno','email','address');
      $data=Datatables::of($learns);
      $data->addColumn('action', function ($learn) {
                return '<button value="'.$learn->id.'" class="btn btn-primary btn-sm btn-edit">Edit</button>&nbsp;<button value="'.$learn->id.'" class="btn btn-danger btn-sm btn-dell">Delete</button>';});
      $data->addColumn('select', function($learn) {
        return '<input type="checkbox" name="selectcb[]" value="'. $learn->id .'"/>';});
        //return '<button value="'.$learn->id.'" class="btn btn-primary btn-sm btn-edit">Edit</button>';});          
      return $data-> make (true);
           
      	}
/*---------------------------------END Show Datatable function---------------------------------------*/ 

/*---------------------------------Delete function---------------------------------------*/
			public function deleteByAjax(Request $req){
				if($req->ajax()){
				$id= $req->input('id');	
     DB::table('learns')->where('id', $id)->delete();
				return response(['id'=>$req->id]);
					}
				}
/*---------------------------------End Delete function---------------------------------------*/        
		
/*---------------------------------EDit function---------------------------------------*/
    	public function editByAjax(Request $req){
				if($req->ajax()){
				$i= $req->input('id');
			//var_dump($i);
        //$id = DB::table('learns')->where('id', $id)->get();
				$jb = DB::table('learns')->where('id', $i)->select('id','fname','lname', 'cno','email','address')->get();
    				//return view('jquery.editByAjax',compact('jb'));
    				return response($jb);
    			
					}				
        }

/*---------------------------------END Edit function---------------------------------------*/
	/*		public function updateByAjax(Request $req){
				if($req->ajax()){
						$data=$req->all();;



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
					 //return response()->json($validator->errors(), 422);
                	return response::json(['success'=>false,'errors'=>$validator->errors()->toArray()]);
					}else{
						$i= $req->input('id');
$a = $req->input('fname');
$b = $req->input('lname');
$c = $req->input('cno');
$d = $req->input('email');
$e = $req->input ('address');

DB::table('learns')->where('id', $i)->update(['fname' => $a, 'lname' => $b , 'cno' => $c, 'email' => $d, 'address' => $e]);

                return response::json(['success'=>true]);
                
                
                	}
            	}
        
				}
	
*/






}