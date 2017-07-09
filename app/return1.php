<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class return1 extends Model
{
    protected $table='returns';
    protected $fillable = ['name','grade','mortgage','borrow','classroom','teacher','status'];
}
