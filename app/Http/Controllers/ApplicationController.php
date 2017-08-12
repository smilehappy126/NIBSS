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
    $application = new application;
    $application->class = $request->class;
    $application->item = $request->equipment;
    $application->itemnum = $request->number;
    $application->license = $request->license;
    $application->classroom = $request->classroom;
    $application->teacher = $request->teacher;
    $application->save();
    return redirect('/');
     //
 	}
}
