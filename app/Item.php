<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['itemgroup','itemname','itemnum','creatuser'];

}
