<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Klinik',
            'email' => 'user@klinik.test',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}