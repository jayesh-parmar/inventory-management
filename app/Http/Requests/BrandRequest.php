<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
            $rules= [
            'name' => ['required', 'unique:brands,name,','max:255'],
        ];
        
        if ($this->isMethod('PUT')) {
           $rules = [
                'name' => 'required','unique:brands,name,' . $this->brandId . 'max:255',

           ];    
        }
        return $rules;
    }
}
