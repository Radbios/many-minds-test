<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'name' => "João",
            'cnpj' => 1234,
        ]);

        Supplier::create([
            'name' => "Sarah",
            'cnpj' => 4567,
        ]);
    }
}
