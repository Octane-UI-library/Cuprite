<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'code_html',
        'code_vue',
        'code_react',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
