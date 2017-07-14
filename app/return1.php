<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class return1 extends Model
{
    protected $table='returns';

    protected $fillable = ['grade','name','date','returntime','mortgage','borrow','borrownum','classroom','teacher','status'];
    public function table()
    {
        return $this->belongsTo(table::class);
    }

   /* public $timestamps = false;


    protected function getDateFormat()

    {
    	@if ($res=return1::where('status','=','已歸還'))
                echo strtotime(date('Y-d-m'));
                @else

        @endif
                
    }*/
}