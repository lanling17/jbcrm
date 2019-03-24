<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'classify_id','name','contacts','sex','email','phone','age','out_lable','in_lable','nature','wx_char','important_grade','remarks','cooperationing','cooperationed','scale','created_id','updated_id'
    ];
}
