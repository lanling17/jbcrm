<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserJurisdictions extends Model
{
    //
    protected $fillable = [
        'user_id', 'jurisdictions_id'
    ];

    //用户权限与用户关系
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //用户权限与权限关系
    public function jurisdiction(){
        return $this->belongsTo('App\Models\Jurisdiction');
    }

    //通过用户ID获取用户权限名称
    public static function getJurisdictionName($uid){
        $result = self::where('user_id',$uid)->get();
        $names = [];
        foreach ($result as $v){
            $juri = Jurisdiction::find($v->jurisdictions_id);
            $names[] = $juri->name;
        }
        return $names;
    }
}
