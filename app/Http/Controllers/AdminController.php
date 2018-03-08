<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Miss;
use App\User;
use App\Rules;
use App\Item;
use App\Itemgroup;
use App\Violation;
use App\Reason;
use Carbon\Carbon;

class AdminController extends Controller
{
//導向管理者頁面
	  public function admin(){
        $users=User::all();
        $violations=Violation::all();
        return view('button5_admin.admin',['users'=>$users,'violations'=>$violations]);
    }

//使用者清單
    //顯示使用者清單頁面
    public function userlists(){
        $users=User::orderBy('level','desc') //預設排列順序為 管理員 → 工讀生 → 一般使用者
                ->paginate(10);
        return view('button5_admin.userlists',['users'=>$users]);
    }
    //使用者清單的編輯功能
    public function updateUserLists(Request $rep, $id)
    {
      $update= User::find($id);
      $update->update(['email'=>$rep->email]);
      $update->update(['phone'=>$rep->phone]);
      $update->update(['violation'=>$rep->violation]);
      $update->update(['level'=>$rep->level]);
      // 更改使用者電話，借用資料記錄裡面一併更改
      $miss=Miss::where('phone','=',$rep->oldphone);
      $miss->update(['phone'=>$rep->phone]);
      // 檢查違規紀錄中是否有此使用者，一併修改他的違規點數
      $reason = Reason::where('phone','=',$rep->phone);
      if(count($reason)==1){
        $reason->update(['violation'=>$rep->violation]);
      }
      return redirect('/admin/userlists');
    }
    //使用者清單的搜尋功能
    public function searchUser(Request $rep){
      $users=User::where('name','like','%'.$rep->searchname.'%')
              ->paginate(10);
      return view('button5_admin.userlists',['users'=>$users]);
    }

//歷史紀錄
    // 歷史紀錄的搜尋
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
                ->orWhere('borrowat','like','%'.$rep->searchcontent.'%')
                ->orWhere('returnat','like','%'.$rep->searchcontent.'%')
                ->orWhere('date','like','%'.$rep->searchcontent.'%')
                ->orWhere('note7','like','%'.$rep->searchcontent.'%')
                  ->paginate(10);
        $users=User::all();
        return view('button5_admin.search',['miss'=> $miss,'content'=>$rep->searchcontent,'users'=>$users]);
    }
    //在管理者頁面裡的搜尋更改內容 
    public function updateContentData(Request $rep, $id)
    {
      $update= Miss::find($id);
      if(($rep->status)==='借用中'){
        $update->update(['borrowat'=>$rep->date]);
        //若是由已歸還變更成借用中，借用中的物品數量會加回去
        if (($rep->oldstatus)==='已歸還') {
          if(($rep->item)<>null)
          {
            $usingitem = Item::where('itemname','=',$rep->item)->first();
            $oldnum = $usingitem->usingnum;
            $newnum = $oldnum + $rep->itemnum;
            $usingitem->update(['usingnum'=>$newnum]);
          }
        }
      }elseif (($rep->status)==='已歸還') {
        $update->update(['returnat'=>$rep->date]);
        // 若是由借用中變更成已歸還，借用中的物品數量會減去
        if (($rep->oldstatus)==='借用中') {
          if(($rep->item)<>null)
          {
            $usingitem = Item::where('itemname','=',$rep->item)->first();
            $oldnum = $usingitem->usingnum;
            $newnum = $oldnum - $rep->itemnum;
            $usingitem->update(['usingnum'=>$newnum]);
          }
        }
      }elseif (($rep->status)==='待審核') {
        //若是由已歸還變更成借用中，借用中的物品數量會加回去
        if (($rep->oldstatus)==='已歸還') {
          if(($rep->item)<>null)
          {
            $usingitem = Item::where('itemname','=',$rep->item)->first();
            $oldnum = $usingitem->usingnum;
            $newnum = $oldnum + $rep->itemnum;
            $usingitem->update(['usingnum'=>$newnum]);
          }
        }
      }

      $update->update(['class'=>$rep->class]);
      $update->update(['name'=>$rep->name]);
      $update->update(['item'=>$rep->item]);
      $update->update(['itemnum'=>$rep->itemnum]);
      $update->update(['license'=>$rep->license]);
      $update->update(['classroom'=>$rep->classroom]);
      $update->update(['teacher'=>$rep->teacher]);
      $update->update(['status'=>$rep->status]);
      $update->update(['note7'=>$rep->note7]);
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
                ->orWhere('borrowat','like','%'.$rep->searchcontent.'%')
                ->orWhere('returnat','like','%'.$rep->searchcontent.'%')
                  ->paginate(10);
      $users=User::all();
      return view('button5_admin.search',['miss'=> $miss,'content'=>$rep->searchcontent,'users'=>$users]);
    }
    //刪除借用資料
    public function searchdelete(Request $rep, $id){
        $delete = Miss::find($id);
        $delete->delete();
        //刪除完成之後重新導向搜尋頁面
        $miss=Miss::where('name','like','%'.$rep->searchcontent.'%')
                ->orWhere('class','like','%'.$rep->searchcontent.'%')
                ->orWhere('phone','like','%'.$rep->searchcontent.'%')
                ->orWhere('item','like','%'.$rep->searchcontent.'%')
                ->orWhere('itemnum','like','%'.$rep->searchcontent.'%')
                ->orWhere('status','like','%'.$rep->searchcontent.'%')
                ->orWhere('teacher','like','%'.$rep->searchcontent.'%')
                ->orWhere('classroom','like','%'.$rep->searchcontent.'%')
                ->orWhere('license','like','%'.$rep->searchcontent.'%')
                ->orWhere('borrowat','like','%'.$rep->searchcontent.'%')
                ->orWhere('returnat','like','%'.$rep->searchcontent.'%')
                ->orWhere('date','like','%'.$rep->searchcontent.'%')
                ->orWhere('note7','like','%'.$rep->searchcontent.'%')
                  ->paginate(10);
        $users=User::all();
        return view('button5_admin.search',['miss'=> $miss,'content'=>$rep->searchcontent,'users'=>$users]);
    }

    //在搜尋頁面更改使用者資料
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
                ->orWhere('borrowat','like','%'.$rep->searchcontent.'%')
                ->orWhere('returnat','like','%'.$rep->searchcontent.'%')
                  ->paginate(10);
      $users=User::all();
      return view('button5_admin.search',['miss'=> $miss,'content'=>$rep->searchcontent,'users'=>$users]);
    }

//編輯條例
    // 進入編輯條例的頁面
    public function rule()
    {
      $rules=Rules::all();
      return view('button5_admin.rule',['rules'=> $rules]);
    }
    //編輯條例頁面中的編輯個資資訊
    public function personInfoupdate(Request $rep){
      $update=Rules::where('id','=','1');
      $update->update(['personInfo'=>$rep->personInfo]);

      return redirect('/admin/rule');
    }
    //編輯條例中的編輯借用規則
    public function noteupdate(Request $rep){
      $update=Rules::where('id','=','1');
      $update->update(['note'=>$rep->note]);

      return redirect('/admin/rule');
    }

//物品清單
    // 進入可借用物品頁面
    public function item(){
      $items=Item::all();
      $itemsgroups=Itemgroup::orderBy('groupname','asc')
                  ->get();
      return view('button5_admin.item',['items'=> $items,'itemsgroups'=> $itemsgroups]);
    }
    //創建新的物品
    public function createitem(Request $rep){
      $items= new Item;
      $items->itemgroup = $rep->itemgroup;
      $items->itemname = $rep->itemname;
      $items->itemnum = $rep->itemnum;
      $items->creator = $rep->creator;
      $items->save();
      //檢查此類別是否已存在，不存在的話就創建，存在的話類別物品的數量加1
      $itemgroupscheck = Itemgroup::where('groupname','=',$rep->itemgroup)->get();
      if (count($itemgroupscheck)<1){
         $itemsgroups = new Itemgroup;
         $itemsgroups->groupname = $rep->itemgroup;
         $itemsgroups->creator = $rep->creator;
         $itemsgroups->save();
      } 
      // else if (count($itemgroupscheck)>=1){
      //    $itemgroupscheck->groupitemnum = $itemgroupscheck->groupitemnum+$rep->itemnum;  
      // }

      return redirect('/admin/item');
    }
    //進入目前清單頁面
    public function itemlists(){
      $items=Item::paginate(10);
      $itemsgroups=Itemgroup::all();
      return view('button5_admin.itemlists',['items'=> $items,'itemsgroups'=> $itemsgroups]);
    }
    //編輯物品相關資訊
    public function updateItemLists(Request $rep, $id){
      $itemsgroups=Itemgroup::all();
      //檢查此類別是否已存在，不存在的話就創建，存在的話類別物品的數量加1
      $itemgroupscheck = Itemgroup::where('groupname','=',$rep->itemgroup)->get();
      if (count($itemgroupscheck)<1){
         $itemsgroups = new Itemgroup;
         $itemsgroups->groupname = $rep->itemgroup;
         $itemsgroups->creator = $rep->creator;
         $itemsgroups->save();
      } 
      $update=Item::find($id);
      $update->update(['itemgroup'=>$rep->itemgroup]);
      $update->update(['itemname'=>$rep->itemname]);
      $update->update(['itemnum'=>$rep->itemnum]);
      $update->update(['creator'=>$rep->creator]);
      //檢查類別物品數量是否為0，物品數量為0時刪除該類別
      $groupchecks = Itemgroup::all();
      foreach ($groupchecks as $groupcheck) {
        $groupitem= Item::where('itemgroup','=',$groupcheck->groupname)->get();
        if(count($groupitem)<1){
          $groupcheck->delete();
        }// End if
      }//End foreach
      return redirect('/admin/itemlists');
    }
    //刪除物品
    public function deleteItemLists(Request $rep, $id){
      $deleteItem=Item::find($id);
      $deleteItem->delete();
      //檢查類別物品數量是否為0，物品數量為0時刪除該類別
      $groupchecks = Itemgroup::all();
      foreach ($groupchecks as $groupcheck) {
        $groupitem= Item::where('itemgroup','=',$groupcheck->groupname)->get();
        if(count($groupitem)<1){
          $groupcheck->delete();
        }// End if
      }//End foreach
      return redirect('/admin/itemlists'); 
    }


//違規次數上限
    public function violationupdate(Request $rep){
      $update=Violation::where('id','=','1');
      $update->update(['violationnum'=>$rep->violationcontent]);
      $update->update(['creator'=>$rep->violationuser]);
      return redirect('/admin');      
    }

//違規紀錄
    //顯示違規紀錄
    public function reasons(){
      $reasons = Reason::paginate(10);
      $users = User::all();
      return view('button5_admin.reason',['reasons'=>$reasons,'users'=>$users]);
    }
    //編輯違規紀錄
    public function updateReasons(Request $rep, $id){
      $update = Reason::find($id);
      if(($update->deletereason)<>'無資料')
      {
        $update->update(['phone'=>$rep->phone]);
        $update->update(['reason'=>$rep->reason]);
        $update->update(['deletereason'=>$rep->deletereason]);
        $update->update(['violation'=>$rep->violation]);
        $update->update(['offsettime'=>Carbon::now('Asia/Taipei')]);
        $user = User::where('phone','=',$rep->phone);
        $user->update(['violation'=>$rep->violation]);
      }
      return redirect('/admin/reasons');
    }
    //搜尋違規紀錄
    public function searchReason(Request $rep){
      $reasons = Reason::where('user','like','%'.$rep->searchname.'%')
                      ->orWhere('phone','like','%'.$rep->searchname.'%')
                      ->orWhere('reason','like','%'.$rep->searchname.'%')
                      ->orWhere('creator','like','%'.$rep->searchname.'%')
                      ->paginate(10);
      return view('button5_admin.reason',['reasons'=>$reasons]);
    }
}

