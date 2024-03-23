<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'buyer' => new UserResource($this->items[0]->buyer),
            'order_finished_by' => new UserResource($this->finished_by_user),
            'purchase_date' => ($this->created_at)->format('d/m/Y'),
            'shipping_date' => $this->shipping_date ? Carbon::parse($this->shipping_date)->format('d/m/Y') : null,
            'total_price' => $this->total_price,
            'quantity_products' => $this->items_sum_quantity,
            'status' => $this->status ? "ativo" : "finalizado",
            'items' => ProductResource::collection($this->items)
        ];
    }
}
