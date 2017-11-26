<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class MyLoginController extends Controller
	
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
    public function mylogin()
    {
        
        return view('button2_borrow.success');
    }
    public function afterlogin()
    {
        
        return redirect()->back();
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->back();
    }
    
    public function admin(){
        return view('button5_admin.admin');
    }
 	
}


