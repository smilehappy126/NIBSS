<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miss extends Model
{
    protected $table = 'miss';
    protected $fillable = ['date','name','item','itemnum','license','classroom','class','teacher','status']; 
    // 借用人名稱, 借用物品, 借用數量, 抵押證件, 授課教室, 借用人班級, 授課教師
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
