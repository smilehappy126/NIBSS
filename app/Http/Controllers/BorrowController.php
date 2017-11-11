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
	
	public function update(Request $rep, $id)
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
      return redirect('/borrow');
	}
  
  // 透過Name來搜尋
  public function searchName(Request $rep)
  {
      $miss=Miss::where('name','=',$rep->searchname)
                  ->get();
      if (count($miss)>=1) {
        return view('button2_borrow.index',['miss'=> $miss]);
      } else if (count($miss)<1){
        return view('button2_borrow.fail',['miss'=> $miss]);
      }
      // return view('button2_borrow.index',['miss'=> $miss]);
  }

  // ID排序
  public function idasc(){
    $miss=Miss::orderBy('id','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function iddesc(){
    $miss=Miss::orderBy('id','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  
  // Date排序
  public function dateasc(){
    $miss=Miss::orderBy('date','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function datedesc(){
    $miss=Miss::orderBy('date','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }

  // Class排序
	public function classasc(){
    $miss=Miss::orderBy('class','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function classdesc(){
    $miss=Miss::orderBy('class','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }

  // Name排序
  public function nameasc(){
    $miss=Miss::orderBy('name','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function namedesc(){
    $miss=Miss::orderBy('name','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }

  // Phone排序
  public function phoneasc(){
    $miss=Miss::orderBy('phone','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function phonedesc(){
    $miss=Miss::orderBy('phone','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }

  // Item排序
  public function itemasc(){
    $miss=Miss::orderBy('item','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function itemdesc(){
    $miss=Miss::orderBy('item','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }

  // Itemnum排序
  public function itemnumasc(){
    $miss=Miss::orderBy('itemnum','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function itemnumdesc(){
    $miss=Miss::orderBy('itemnum','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }

  // License排序
  public function licenseasc(){
    $miss=Miss::orderBy('license','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function licensedesc(){
    $miss=Miss::orderBy('license','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }

  // Classroom排序
  public function classroomasc(){
    $miss=Miss::orderBy('classroom','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function classroomdesc(){
    $miss=Miss::orderBy('classroom','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }

  // Teacher排序
  public function teacherasc(){
    $miss=Miss::orderBy('teacher','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function teacherdesc(){
    $miss=Miss::orderBy('teacher','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }

  // Status排序
  public function statusasc(){
    $miss=Miss::orderBy('status','asc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
  public function statusdesc(){
    $miss=Miss::orderBy('status','desc')
                ->get();
    return view('button2_borrow.index',['miss'=> $miss]);
  }
}
