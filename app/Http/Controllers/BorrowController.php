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
	public function edit($id)
	{
        $miss= Miss::find($id);
        return view('button2_borrow.edit',['miss'=>$miss]);
	}
	public function update(Request $rep, $id)
	{
      $update= Miss::find($id);
      $update->update(['date'=>$rep->date]);
      $update->update(['class'=>$rep->class]);
      $update->update(['name'=>$rep->name]);
      $update->update(['item'=>$rep->item]);
      $update->update(['itemnum'=>$rep->itemnum]);
      $update->update(['license'=>$rep->license]);
      $update->update(['classroom'=>$rep->classroom]);
      $update->update(['teacher'=>$rep->teacher]);
      $update->update(['status'=>$rep->status]);
      return redirect('/borrow');
	}
	
}
