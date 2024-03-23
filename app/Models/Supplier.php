<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cnpj'
    ];

    public function product_supplier()
    {
        return $this->hasMany(ProductSupplier::class, 'supplier_id');
    }
}
