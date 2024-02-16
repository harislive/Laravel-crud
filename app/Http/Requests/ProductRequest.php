<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'digits_between:1,5'],
            'image' => [$this->isMethod('POST') ? 'required' : 'nullable', 'image', 'mimes:png,jpg', 'max:5120'],
        ];
    }
}
