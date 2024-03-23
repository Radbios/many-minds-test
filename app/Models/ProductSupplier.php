<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'product_id',
        'supplier_id',
        'value_un',
        'status',
    ];

    public function product_is_active()
    {
        return $this->status === 1;
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
