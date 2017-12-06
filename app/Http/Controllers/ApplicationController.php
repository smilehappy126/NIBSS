<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Miss;
use Carbon\Carbon;
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
    $application->classroom = $request->classroom;
    $application->teacher = $request->teacher;
    $application->phone = $request->phone;
    $application->date = Carbon::today()->format('Y-m-d');
    // echo($application->date);
    $application->status = '借用中';
    $application->save();
    return redirect('/create');
     //
 	}
}


