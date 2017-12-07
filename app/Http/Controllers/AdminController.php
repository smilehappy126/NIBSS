<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Miss;
use App\User;

class AdminController extends Controller
{
    //導向管理者頁面
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
        return view('button5_admin.search',['miss'=> $miss],['content'=>$rep->searchcontent]);
        
  }
    public function userlists(){
        $users=User::orderBy('level','desc') //預設排列順序為 管理員 → 工讀生 → 一般使用者
                ->get();
        return view('button5_admin.userlists',['users'=>$users]);
    }
    public function updateUserLists(Request $rep, $id)
  {
      $update= User::find($id);
      $update->update(['email'=>$rep->email]);
      $update->update(['violation'=>$rep->violation]);
      $update->update(['level'=>$rep->level]);
      return redirect('/admin/userlists');
  }
  //在管理者頁面裡的搜尋更改內容 
  public function updateContentData(Request $rep, $id)
  {
      $update= Miss::find($id);
      $update->update(['date'=>$rep->date]);
      $update->update(['class'=>$rep->class]);
      $update->update(['phone'=>$rep->phone]);
      $update->update(['name'=>$rep->name]);
      $update->update(['item'=>$rep->item]);
      $update->update(['itemnum'=>$rep->itemnum]);
      $update->update(['license'=>$rep->license]);
      $update->update(['classroom'=>$rep->classroom]);
      $update->update(['teacher'=>$rep->teacher]);
      $update->update(['status'=>$rep->status]);
      //按下確認編輯之後重新導向回搜尋頁面
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
        return view('button5_admin.search',['miss'=> $miss],['content'=>$rep->searchcontent]);
  }
}
