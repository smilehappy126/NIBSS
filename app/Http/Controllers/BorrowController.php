<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Miss;
use App\User;
use App\Reason;
use Carbon\Carbon;

class BorrowController extends Controller
{
        //
	public function index()
	{
		$miss = Miss::where('status','=','借用中')
                  ->orWhere('status','=','待審核')
                  ->get();
    $users = User::all();
    $reasons = Reason::all();
		return view('button2_borrow.index',['miss'=> $miss],['users'=> $users],['reasons'=>$reasons]);

	}
	
	public function update(Request $rep, $id)
	{
      $update= Miss::find($id);
      $update->update(['class'=>$rep->class]);
      $update->update(['name'=>$rep->name]);
      $update->update(['item'=>$rep->item]);
      $update->update(['itemnum'=>$rep->itemnum]);
      $update->update(['license'=>$rep->license]);
      $update->update(['classroom'=>$rep->classroom]);
      $update->update(['teacher'=>$rep->teacher]);
      $update->update(['status'=>$rep->status]);
      $update->update(['audit'=>$rep->audit]);
      $update->update(['note7'=>$rep->note7]);
      if ($rep->status==='已歸還') {
        $time = Carbon::now();
        $update->update(['returnat'=>$time]);
      }
      
      return redirect('/borrow');
  }
  public function updatenote(Request $rep, $id)
  {
    $update=Miss::find($id);
    $update->update(['note7'=>$rep->note7]);
    return redirect('/borrow');
  }

  public function userupdate(Request $rep)
    {
      $update= User::where('phone','=',$rep->phone);
      $update->update(['violation'=>$rep->violation]);
      $reason=new Reason();
      $reason->user = $rep->username;
      $reason->phone= $rep->phone;
      $reason->reason = $rep->reason;
      $reason->creator = $rep->reasoncreator;
      $reason->save();
      return redirect('/borrow');
    }

  
  // 透過Name來搜尋
  // public function search(Request $rep)
  // {
  //     $miss=Miss::where('name','like','%'.$rep->searchname.'%')
  //                 ->get();
  //     if (count($miss)>=1) {
  //       return view('button2_borrow.index',['miss'=> $miss]);
  //     } else if (count($miss)<1){
  //       return view('button2_borrow.fail',['miss'=> $miss]);
  //     }
  // }
 //  // ID排序
 //  public function idasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('id','asc')
 //                ->get();
 //    $counter=2;
 //    return view('button2_borrow.index',['miss'=> $miss],['counter'=> $counter]);
 //  }
 //  public function iddesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('id','desc')
 //                ->get();
 //    $counter=1;
 //    return view('button2_borrow.index',['miss'=> $miss],['counter'=>$counter]);
 //  }
  
 //  // Date排序
 //  public function dateasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('date','asc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
 //  public function datedesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('date','desc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }

 //  // Class排序
	// public function classasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('class','asc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
 //  public function classdesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('class','desc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }

 //  // Name排序
 //  public function nameasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('name','asc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
 //  public function namedesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('name','desc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }

 //  // Phone排序
 //  public function phoneasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('phone','asc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
 //  public function phonedesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('phone','desc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }

 //  // Item排序
 //  public function itemasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('item','asc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
 //  public function itemdesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('item','desc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }

 //  // Itemnum排序
 //  public function itemnumasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('itemnum','asc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
 //  public function itemnumdesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('itemnum','desc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }

 //  // License排序
 //  public function licenseasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('license','asc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
 //  public function licensedesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('license','desc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }

 //  // Classroom排序
 //  public function classroomasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('classroom','asc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
 //  public function classroomdesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('classroom','desc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }

 //  // Teacher排序
 //  public function teacherasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('teacher','asc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
 //  public function teacherdesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('teacher','desc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }

 //  // Status排序
 //  public function statusasc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('status','asc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
 //  public function statusdesc(){
 //    $miss=Miss::where('status','=','借用中')
 //                ->orderBy('status','desc')
 //                ->get();
 //    return view('button2_borrow.index',['miss'=> $miss]);
 //  }
}
