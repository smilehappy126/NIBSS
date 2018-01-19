<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Itemgroup extends Model
{
    protected $table = 'itemgroups';
    protected $fillable = ['groupname','groupitemnum','creator'];

}
