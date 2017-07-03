<?php

namespace App\Http\Controllers;

use App\return1;
use App\Http\Controllers\Controller;

class returnController extends Controller
{
	
	public function index()
{
    $res = return1::all();
    return view('button3_return.index',['res' => $res]);
}
}