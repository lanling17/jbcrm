<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password','username','mobile','head_pic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 用户与用户角色关系
     */
    public function userRoles()
    {
        return $this->hasMany('App\Models\UserRole');
    }

    /*
     * 用户与用户权限关系
     * */
    public function userJurisdictions(){
        return $this->hasMany('App\Models\UserJurisdictions');
    }
}
