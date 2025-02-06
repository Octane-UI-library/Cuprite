<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'slug' => 'required|string|max:255|regex:/^[a-zA-Z0-9-]+$/',
            'icon_id' => 'required|exists:icons,id',
        ];
    }
}
