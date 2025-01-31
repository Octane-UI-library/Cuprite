<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Component extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'code',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
