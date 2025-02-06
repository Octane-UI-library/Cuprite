<?php

namespace App\Http\Requests\Icons;

use Illuminate\Foundation\Http\FormRequest;

class IconRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:4|max:255',
            'class' => 'required|string|min:3|max:255',
        ];
    }
}
