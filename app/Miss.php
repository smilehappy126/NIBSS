<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miss extends Model
{
    protected $table = 'miss';
    protected $fillable = ['date','name','item','itemnum','phone','license','classroom','class','teacher','status','audit','note7','borrowat','returnat']; 
    // 借用人名稱, 借用物品, 借用數量, 電話, 抵押證件, 授課教室, 借用人班級, 授課教師, 審核者, 備註, 借用時間, 歸還時間
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
