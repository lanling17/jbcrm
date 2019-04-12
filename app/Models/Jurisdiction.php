<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurisdiction extends Model
{
    //
    protected $fillable = [
        'name','slug','http_method','http_path'
    ];

    /*
     * 权限与用户权限关系
     * */
    public function userJurisdictions(){
        return $this->hasMany('App\Models\UserJurisdictions');
    }
}
