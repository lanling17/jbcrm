<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $fillable = [
        'user_id','role_id'
    ];

    //获取与用户相关联的角色名称
    public static function getUserRoleName($user_id){
      $result = self::where('user_id',$user_id)->get();
      $name = [];
      foreach ($result as $key => $value) {
        $role = Role::find($value->role_id);
        $name[] = $role->name;
      }
      return $name;
    }

    //获取与用户相关联的角色ID
    public static function getUserRoleId($user_id){
      $result = self::where('user_id',$user_id)->get();
      $ids = [];
      foreach ($result as $key => $value) {
        $ids[] = $value->role_id;
      }
      return $ids;
    }
}
