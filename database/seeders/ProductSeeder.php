<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'code' => "ABNSK",
            'name' => 'Pipoca',
            'value_un' => '2',
        ]);

        Product::create([
            'code' => "ABNSK",
            'name' => 'Jujuba',
            'value_un' => '0.1',
        ]);
    }
}
