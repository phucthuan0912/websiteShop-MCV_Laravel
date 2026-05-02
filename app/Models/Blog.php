<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = false;
    protected $table = "blogs";
    protected $fillable = [
        'title',
        'image',
        'description',
        'content',
    ];
}
