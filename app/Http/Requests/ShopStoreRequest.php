<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopStoreRequest extends FormRequest
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
            'product_supplier_id' => ['required', 'integer'],
            'quantity' => ['integer', 'min:1']
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'product_supplier_id.required' => 'O campo "product_supplier_id" é obrigatório.',
            'product_supplier_id.integer' => 'O campo "product_supplier_id" deve ser um inteiro.',
            'quantity.integer' => 'A quantidade deve ser um inteiro.',
            'quantity.min' => 'O número mínimo de itens é 1 (um).',
        ];
    }
}
