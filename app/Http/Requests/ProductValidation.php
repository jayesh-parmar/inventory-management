<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', Rule::unique('products')->ignore($this->product, 'name')],
            'brand_id' => ['required','string', 'max:255'],
            'color_id' => ['required','string','max:255'],
            'size_id' => ['required','string','max:255'],
            'status' => ['required','boolean','max:255'],
        ];
    }
}
