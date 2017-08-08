<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=['roomname','weekFirst','classTime','teacher','content'];
    
}
