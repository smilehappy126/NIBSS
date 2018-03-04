<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['itemgroup','itemname','itemnum','usingnum','creator'];
    // 物品類別, 物品名稱, 總物品數量, 借用中的物品數量, 物品更新者
}
