<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $table = 'reasons';
    protected $fillable = ['user','phone','reason','deletereason','creator','violation']; 
    // 違規者, 違規者電話, 違規原因, 撤銷雸因, 審核者, 違規者違規點數
}
