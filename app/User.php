<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'violation','level', 'phone'
    ];
    //使用者姓名, 使用者信箱, 使用者密碼, 使用者違規點數, 使用者權限, 使用者電話

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function miss()
    {
        return $this->hasMany(Miss::class);
    }
}
