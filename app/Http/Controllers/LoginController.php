<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
	
{
 	public function welcome(){
       $users=User::all();
       return view('welcome',['users'=>$users]);//
    }

    public function index()
 	{
       $users=User::all();
       return view('welcome',['users'=>$users]);//
 	}

 	
}


