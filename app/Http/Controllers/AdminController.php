<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Miss;
use App\User;

class AdminController extends Controller
{
        //
	  public function admin(){
        $users=User::all();
        return view('button5_admin.admin',['users'=>$users]);
    }
    // 透過Content來搜尋
    public function searchall(Request $rep){
        $miss=Miss::where('name','like','%'.$rep->searchcontent.'%')
                ->orWhere('class','like','%'.$rep->searchcontent.'%')
                ->orWhere('phone','like','%'.$rep->searchcontent.'%')
                ->orWhere('item','like','%'.$rep->searchcontent.'%')
                ->orWhere('itemnum','like','%'.$rep->searchcontent.'%')
                ->orWhere('status','like','%'.$rep->searchcontent.'%')
                ->orWhere('teacher','like','%'.$rep->searchcontent.'%')
                ->orWhere('classroom','like','%'.$rep->searchcontent.'%')
                ->orWhere('license','like','%'.$rep->searchcontent.'%')
                ->orWhere('date','like','%'.$rep->searchcontent.'%')
                  ->get();
        if (count($miss)>=1) {
          return view('button2_borrow.index',['miss'=> $miss]);
        } else if (count($miss)<1){
          return view('button2_borrow.fail',['miss'=> $miss]);
        }
  }
    public function userlists(){
        $users=User::all();
        return view('button5_admin.userlists',['users'=>$users]);
    }
    public function update(Request $rep, $id)
  {
      $update= User::find($id);
      $update->update(['email'=>$rep->email]);
      $update->update(['violation'=>$rep->violation]);
      $update->update(['level'=>$rep->level]);
      return redirect('/admin/userlists');
  }
}
