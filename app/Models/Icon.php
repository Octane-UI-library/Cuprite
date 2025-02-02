<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Icon extends Model
{
    protected $fillable = [
        'name',
        'class'
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'icon_id');
    }
}
