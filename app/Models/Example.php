<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'category_id',
    ];
}
