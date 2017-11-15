<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
	
{
 	public function welcome(){
       $users=User::all();
       return view('welcome',['users'=>$users]);//
    }

    public function login(Request $rep)
 	{
       $users=User::where('name','=',$rep->LoginAccount)
                        ->get();
       if(count($users)>=1){
        return view('button2_borrow.success',['users'=>$users]);
       }
       elseif (count($users)<1) {
        return view('welcome',['users'=>$users]);
       }
              

 	}
    public function loginauth(Request $rep)
    {
       $users=User::all();
       if(Auth::attempt(array(['name'=>$rep->LoginAccount,'password'=>$rep->LoginPassword])))
        {
          return view('button2_borrow.success',['users'=>$users]);     
        }
        else
       {
           return view('welcome');
       }

    }
 	
}


