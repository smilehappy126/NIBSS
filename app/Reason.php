<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $table = 'reasons';
    protected $fillable = ['user','phone', 'email','reason','deletereason','creator','violation', 'violationtime', 'offsettime']; 
    // 違規者, 違規者電話, 違規者信箱, 違規原因, 撤銷雸因, 審核者, 違規者違規點數, 違規時間, 抵銷時間
}
