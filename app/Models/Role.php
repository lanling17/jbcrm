<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'name','slug'
    ];

    //角色与角色权限关系
    public function roleJurisdiction(){
        return $this->hasMany('App\Models\RoleJurisdiction');
    }


}
