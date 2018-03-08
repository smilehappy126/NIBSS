<?php

namespace App\Http\Controllers;

use App\Miss;
use App\User;
use App\Item;
use App\Reason;
use Carbon\Carbon;
use Illuminate\Http\Request;

class returnController extends Controller
{
  
  public function index()
  {
    $users=User::all();
    $res = Miss::where('status','=','已歸還')->orderBy('returnat','desc')->get();
    $reasons = Reason::all();
    return view('button3_return.index',['res'=> $res,'users'=>$users,'reasons'=>$reasons]);
  }


	public function update(Request $rep, $id)
	{
      $update=Miss::find($id);
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
      if ($rep->status === '已歸還') {
        $update->update(['returnat'=>$rep->returnat]);
      }elseif($rep->status==='借用中'){
        $usingitem = Item::where('itemname','=',$rep->item)->first();
        $oldnum = $usingitem->usingnum;
        $newnum = $oldnum + $rep->itemnum;
        $usingitem->update(['usingnum'=>$newnum]);
        //若是物品從已歸還 => 借用中，借用中的物品數量加回去
      }  
      $update->save();
      return redirect('/return');
	}
  // 透過Name來搜尋
  public function search(Request $rep)
  {
      $res=Miss::where('name','like','%'.$rep->searchname.'%')
                  ->get();
      if (count($res)>=1) {
        return view('button3_return.index',['res'=> $res]);
      } else if (count($miss)<1){
        return view('button3_return.fail',['res'=> $res]);
      }
  }
  public function userupdate(Request $rep)
    {
      $update= User::where('email','=',$rep->useremail);
      $update->update(['violation'=>$rep->violation]);
      $reason=new Reason();
      $reason->user = $rep->username;
      $reason->phone= $rep->phone;
      $reason->reason = $rep->reason;
      $reason->creator = $rep->reasoncreator;
      $reason->save();
      return redirect('/return');
    }
  public function updatenote(Request $rep, $id)
  {
    $update=Miss::find($id);
    $update->update(['note7'=>$rep->note7]);
    return redirect('/return');
  }




}