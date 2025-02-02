<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon_id',
    ];

    public function components(): HasMany
    {
        return $this->hasMany(Component::class);
    }

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class, 'icon_id');
    }
}

