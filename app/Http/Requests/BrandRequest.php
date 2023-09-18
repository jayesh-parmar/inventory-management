<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $rules = [
                'name' => ['required','max:255',Rule::unique('brands')->ignore($this->brand, 'name')],
                ];
        
        return $rules;
    }
}