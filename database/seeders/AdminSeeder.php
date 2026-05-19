<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'ntwariburora@gmail.com'],
            [
                'name'     => 'Admin',
                'email'    => 'ntwariburora@gmail.com',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
