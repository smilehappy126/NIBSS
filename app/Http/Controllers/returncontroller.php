<?php

namespace App\Http\Controllers;

use App\return1;
use Illuminate\Http\Request;

class returnController extends Controller
{
	
	public function index()
{
    $res = return1::all();
    return view('button3_return.index',['res' => $res]);
}

	public function update(Request $rep, $id)
	{
      $update= return1::find($id);
      $update->update(['grade'=>$rep->grade]);
      $update->update(['name'=>$rep->name]);
      $update->update(['date'=>$rep->date]);
      $update->update(['borrow'=>$rep->borrow]);
      $update->update(['borrownum'=>$rep->borrownum]);
      $update->update(['mortgage'=>$rep->mortgage]);
      $update->update(['classroom'=>$rep->classroom]);
      $update->update(['teacher'=>$rep->teacher]);
      $update->update(['status'=>$rep->status]);
      $update->save();
      return redirect('/return');
	}

}