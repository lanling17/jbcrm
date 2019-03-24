<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurisdiction extends Model
{
    //
    protected $fillable = [
        'name','slug','http_method','http_path'
    ];

}
