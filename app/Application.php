<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['name','item[]','itemnum[]','license','classroom','class','teacher']; 
 }