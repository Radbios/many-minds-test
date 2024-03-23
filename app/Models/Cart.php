<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'product_supplier_id',
        'quantity',
        'status'
    ];

    public function product_supplier()
    {
        return $this->belongsTo(ProductSupplier::class, 'product_supplier_id');
    }
    public function buyer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
