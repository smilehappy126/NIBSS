<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules;
use App\Violation;
use Auth;

class MyLoginController extends Controller
	
{
 	public function welcome(){
       $users=User::all();
       $rulescheck= Rules::all();
       $violationscheck=Violation::all();
       //借用注意事項預設值
       if(count($rulescheck)<1){
         $rules= new Rules;
         $rules->personinfo ="『本表單蒐集之個人資料，僅限於設備、教室借用相關事宜之聯絡，非經當事人同意，絕不轉作其他用途，亦不會公布任何資訊， 並遵循本校個人資料保護管理制度資料保存與安全控管辦理。』" ;
         $rules->note="1.鑰匙不得轉借他人使用，委託他人歸還時借用人仍須對教室之狀態負責並遵守資管系教室使用規則。
         2.一筆申請單只借一個時段。
         3.使用105、107、017教室上課時教室內二個門都請務必要開啟，下課時務必再次確認二個門是否都有關好。
         4.離開前務必確認教室內之 1.冷氣 2.投影機 3.電燈 4.電腦或電子講桌 5.麥克風6.桌上之總電源7.門窗等，是否都已關閉？
         5.在關門時，請再次確認門是否上鎖了(要鎖到底)。
         6.使用後請借用人督促同學將垃圾帶走並維持教室之整潔。
         7.夜間教室借用請於當日下午16:00~17:00於系辦申請，以鐘聲為準，逾時視為放棄借用之權利。
         8.鑰匙請於活動後1小時內歸還，逾下班時間者請於隔日9:00前歸還。
         9.借用器材時，請明確備註「活動名稱+歸還日期及時間」，若無填寫歸還日期及時間者，視為活動結束隔日早上09:00前歸還。
         10.借用器材者請務必愛惜使用並應盡妥善保管之義務。
         11.器材若損壞或遺失，借用人應負起賠償之責任。
         12.違反以上規定者，系辦有權停借教室及器材。
         13.夜間活動借用教室請於晚上10:00點前結束。
         14.以上若有未盡事宜悉依本校及管院相關規定辦理，若發現教室或設備有異常現象，請速通知系辦(vinceku@mgt.ncu.edu.tw或ncu6500@ncu.edu.tw )分機66500，否則最後之借用人應負起相關責任。";
          $rules->save();
       }
       if(count($violationscheck)<1){
         $violations = new Violation;
         $violations->violationnum = "3";
         $violations->save();
       }

       $violations=Violation::all();
       return view('welcome',['users'=>$users,'violations'=>$violations]);//
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
          return redirect('/');
    }
}


