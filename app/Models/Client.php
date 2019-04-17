<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'name',
        'sex',
        'birthday',
        'company',
        'position',
        'email',
        'telephone',
        'wx_char',
        'area',
        'address',
        'industry',
        'relation',
        'remark',
        'cooperationing',
        'cooperationed',
        'created_id',
        'updated_id'];

    //客户与分类关联
    public function classify(){
      return $this->belongsTo('App\Models\Classify');
    }

    //客户于创建者关联
    public function createUser(){
      return $this->belongsTo('App\Models\User','created_id');
    }

    //客户于更新者关联
    public function updateUser(){
      return $this->belongsTo('App\Models\User','updated_id');
    }
}
