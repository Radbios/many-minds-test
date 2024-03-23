<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public function product_is_active()
    {
        return $this->status === 1;
    }

    public function product_supplier()
    {
        return $this->hasMany(ProductSupplier::class, 'product_id');
    }
}
