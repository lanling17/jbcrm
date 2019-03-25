<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'classify_id',
        'name',
        'contacts',
        'sex',
        'email',
        'phone',
        'age',
        'company',
        'position',
        'out_lable',
        'in_lable',
        'nature',
        'wx_char',
        'important_grade',
        'remarks',
        'cooperationing',
        'cooperationed',
        'scale',
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
