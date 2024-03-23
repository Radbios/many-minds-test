<?php

namespace Database\Seeders;

use App\Models\ProductSupplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductSupplier::create([
            'product_id' => 1,
            'supplier_id' => 1,
            'code' => 123456,
            'value_un' => 0.2,
        ]);
    }
}
