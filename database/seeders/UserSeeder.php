<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->delete();

        User::create([
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin"),
            "name" => "Administrador",
            "role_id" => 1
        ]);

        User::create([
            "email" => "client@gmail.com",
            "password" => Hash::make("client"),
            "name" => "Cliente",
            "role_id" => 2
        ]);
    }
}
