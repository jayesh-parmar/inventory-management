<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $rules= [
            'name' => ['required', 'unique:products,name,','max:255'],
            'brand_id' => ['required', 'max:255'],
            'color_id' => ['required', 'max:255'],
            'size_id' => ['required', 'max:255'],
            'status' => ['required', 'max:255'],
        ];
        if ($this->isMethod('PUT')) {
           $rules = [
                'name' => 'required','unique:products,name,' . $this->productId . 'max:255',
                'brand_id' => ['required', 'max:255'],
                'color_id' => ['required', 'max:255'],
                'size_id' => ['required', 'max:255'],
                'status' => ['required', 'max:255'],
           ];    
        }
        return $rules;
    }
}
