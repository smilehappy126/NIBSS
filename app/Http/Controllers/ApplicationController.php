<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Miss;
use App\User;
use App\Rules;
use Carbon\Carbon;
class ApplicationController extends Controller
	
{
 	public function index()
 	{
        $rules=Rules::all();
       return view('button1_create.index',['rules'=> $rules]);//
 	}

    public function set()
    {
      return view('button1_create.setphone');//
    }
 	
    public function store(Request $request)
 	{	   
    $eq = array();
    $num = array();
    $classroom = "$request->classroom$request->key"; 

    $eq = $request->item;
    $num =$request->itemnum;

    /*$str_eq = json_encode($eq);
    $str_num = json_encode($num);*/
    $str_eq = join(" , ",$eq);
    $str_num = join(" , ",$num);

    
    $application = new Miss;
    $application->name = $request->name;
    $application->class = $request->class;
    $application->item =  $str_eq;
    $application->itemnum = $str_num;
    $application->license = $request->license;
    $application->classroom = $classroom;
    $application->teacher = $request->teacher;
    $application->phone = $request->phone;
    $application->date = Carbon::today()->format('Y-m-d');
    // echo($application->date);
    $application->status = '借用中';
    $application->save();
    return redirect('/');
     //
 	}

    public function setphone(Request $request)
    {
    $update = User::where('email','=','$request->currentuser')->first();      
    $editphone = $request->phone;
    $update->update(['phone'=>'$editphone']);
    return redirect('/');   
    }
}


