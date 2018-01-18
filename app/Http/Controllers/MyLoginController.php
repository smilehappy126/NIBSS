<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Violation;
use Auth;

class MyLoginController extends Controller
	
{
 	public function welcome(){
       $users=User::all();
       $violation=Violation::where('id','=','1')->get();
       return view('welcome',['users'=>$users,'violation'=>$violation]);//
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
}


