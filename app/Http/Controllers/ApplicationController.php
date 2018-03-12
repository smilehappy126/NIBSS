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
    
    
    $dt = Carbon::now('Asia/Taipei');
    
    $i=count($eq);
    $j=0;
    do{
    $application = new Miss;
    $application->name = $request->name;
    $application->class = $request->class;
    
        if($eq[$j] == null)
        {
            $application->item ='無';
            $application->itemnum = null;
            $using[$j] = 0;
        }
        if($eq[$j] !== null)
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
    $application->status = '待審核';
    $application->audit = '無';
    $application->note7 = $request->note7;
    $application->borrowat = $dt;
    $application->save();
    
    if($using[$j] !== 0)
    {
        $newusing = $num[$j] + $using[$j];
        $upusing=Item::where('itemname','=',$eq[$j]);      
        $upusing->update(['usingnum'=>$newusing]);
    }
    
    $j++;
    }while ($j < $i);
     
    
    $update=User::where('email','=',$request->email);      
    $update->update(['phone'=>$request->phone]);
    return redirect('/borrow');
    }
    
    
}


