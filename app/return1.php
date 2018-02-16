<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class return1 extends Model
{
    protected $table='returns';

    protected $fillable = ['grade','name','updated_at','date','returntime','mortgage','borrow','borrownum','classroom','teacher','status','note7'];

    public function table()
    {
        return $this->belongsTo(table::class);
        
    }

   
    

    public function setUpdatedAtAttribute()

    {
         $timestamps = false ;
    }

   
}