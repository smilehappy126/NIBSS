<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Itemgroup extends Model
{
    protected $table = 'itemgroups';
    protected $fillable = ['groupname','groupitemnum','creator'];
    // 物品類別名稱, 類別物品數量, 類別更新者
}
