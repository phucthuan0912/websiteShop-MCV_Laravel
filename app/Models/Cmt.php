<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cmt extends Model
{
    public $timestamps = false;
   
    protected $fillable = [
        'cmt',
        'blog_id',
        'user_id',
        'name',
        'level',
        'avatar'
    ];
}
