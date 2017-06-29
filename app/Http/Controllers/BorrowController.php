<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Miss;

class BorrowController extends Controller
{
        //
	public function index()
	{
		$miss = Miss::all();
		return view('button2_borrow.index',['miss'=> $miss]);

	}
	public function edit($id)
	{
        $mis=Miss::find($id);
        return view('button2_borrow.edit',['mis'=>$mis]);
	}
	
}
