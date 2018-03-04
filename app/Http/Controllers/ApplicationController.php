<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Miss;
use App\User;
use App\Rules;
use App\Violation;
use App\Item;
use App\Itemgroup;
use App\Classroom;
// use App\SocialAccount;
use Carbon\Carbon;
class ApplicationController extends Controller
	
{
 	public function index()
 	{
        $rules=Rules::all();
        $users=User::all();
        $violations=Violation::all();
        $items=Item::orderBy('itemname','asc')->get();
        $itemgroups=Itemgroup::orderBy('groupname','asc')->get();
        $classrooms=Classroom::all();
       return view('button1_create.index',['rules'=> $rules,'users'=> $users,
       'violations'=>$violations,'items'=>$items,'itemgroups'=>$itemgroups,'classrooms'=>$classrooms]);//
 	}

    public function store(Request $request)
 	{	   
    $eq = array();
    $num = array();
    $usnig =array();
    $classroom = "$request->classroom$request->key"; 
    
    $eq = $request->item;
    $num = $request->itemnum;
    $using = $request->usingnum;
    
    $i=count($eq);
    /*if($eq !== null){
        $str_eq = implode(" , ",$eq);
        $str_num = implode(" , ",$num);
    }*/
    
    $dt = Carbon::now('Asia/Taipei');
    
    for ($j=0 ; $j<$i ; $j++) 
    { 
    $newusing = $num[$j] + $using[$j];

    $application = new Miss;
    $application->name = $request->name;
    $application->class = $request->class;
    
        if($request->item == null)
        {
            $application->item ='無';
            $application->itemnum = 0;
            $request->usingnum = 0;
        }
        if($request->item !== null)
        {
            $application->item =  $eq[$j];
            $application->itemnum = $num[$j];
        }
    $application->email = $request->useremail;
    $application->license = $request->license;
    $application->classroom = $classroom;
    $application->teacher = $request->teacher;
    $application->phone = $request->phone;
    $application->date = $dt;
    // echo($application->date);
    $application->status = '待審核';
    $application->audit = '無';
    $application->note7 = $request->note7;
    $application->borrowat = $dt;
    $application->save();
    
    $upusing=Item::where('itemname','=',$eq[$j]);      
    $upusing->update(['usingnum'=>$newusing]);
    }
    $update=User::where('email','=',$request->email);      
    $update->update(['phone'=>$request->phone]);
    return redirect('/');
    }
    
    



    // $socialaccount=SocialAccount::where('email','=',$request->email);
    // $socialaccount->update(['phone'=>$request->phone])
     //
 	

}


