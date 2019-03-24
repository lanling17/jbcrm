<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleJurisdiction extends Model
{
    //
    protected $fillable = [
        'role_id','jurisdiction_id'
    ];

    //角色权限关系与角色
    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    //通过角色ID获取该角色所有权限的名称
    public static function getRoleJurisdictionName($role_id){
        $result = self::where('role_id',$role_id)->get();
        $names = [];
        foreach ($result as $v){
            $juri = Jurisdiction::find($v->jurisdiction_id);
            $names[] = $juri->name;
        }
        return $names;
    }

    //通过角色ID获取该角色所有权限的ID
    public static function getRoleJurisdictionId($role_id){
        $result = self::where('role_id',$role_id)->get();
        $ids = [];
        foreach ($result as $v){
            $ids[] = $v->jurisdiction_id;
        }
        return $ids;
    }
}
