<?php

namespace App\Models; //这里从App改成了App\Models

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'admins';

    //去掉我创建的数据表没有的字段
    protected $fillable = [
        'name', 'password'
    ];

    //去掉我创建的数据表没有的字段
    protected $hidden = [
        'password'
    ];
    //将密码进行加密
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}