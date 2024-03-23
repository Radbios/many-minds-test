<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product_code' => $this->product_supplier->code,
            'product_name' => $this->product_supplier->product->name,
            'quantity' => $this->quantity,
            'value_un' => $this->product_supplier->value_un,
            'value_total' => number_format($this->quantity * $this->product_supplier->value_un,2),
            'supplier' =>  [
                $this->product_supplier->supplier->cnpj,
                $this->product_supplier->supplier->name,
            ]
        ];
    }
}
