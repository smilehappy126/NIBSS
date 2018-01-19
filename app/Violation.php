<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $table = 'violations';
    protected $fillable = ['violationnum','creator']; 
    // 違規次數、規則修改者
}
