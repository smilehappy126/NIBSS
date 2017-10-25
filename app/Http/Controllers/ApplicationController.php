<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class ApplicationController extends Controller
	
{
 	public function index()
 	{
       return view('button1_create.index');//
 	}
 	public function store(Request $request)
 	{	   
    $eq = array();
    $num = array();
    
    $eq = $request->equipment;
    $num =$request->number;

    /*$str_eq = json_encode($eq);
    $str_num = json_encode($num);*/
    $str_eq = join(" , ",$eq);
    $str_num = join(" , ",$num);

    
    $application = new Application;
    $application->name = $request->username;
    $application->class = $request->class;
    $application->item =  $str_eq;
    $application->itemnum = $str_num;
    $application->license = $request->license;
    $application->classroom = $request->classroom;
    $application->teacher = $request->teacher;
    $application->save();
    return redirect('/create');
     //
 	}
}
