<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    protected $table = 'rules';
    protected $fillable = ['personinfo','note']; 
    // 個資同意書, 借用規則
     public function rules()
    {
        return $this->belongsTo(Rules::class);
    }
}
