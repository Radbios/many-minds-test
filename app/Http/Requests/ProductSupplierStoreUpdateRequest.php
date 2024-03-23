<?php

namespace App\Http\Requests;

use App\Models\ProductSupplier;
use Illuminate\Foundation\Http\FormRequest;

class ProductSupplierStoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'code' => ['required', 'unique:product_suppliers,code,except,id'],
            'value_un' => ['required', 'numeric'],
        ];
        if($this->method() == 'POST'){
            if($this->has("product_id")){
                $rules['product_id'] = ['integer', 'required'];
            }
            else{
                $rules['supplier_id'] = ['integer', 'required'];
            }
        }

        return $rules;
    }
}
