<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account
        User::updateOrCreate(
            ['email' => 'admin@clinic.com'],
            [
                'name'     => 'Admin',
                'email'    => 'admin@clinic.com',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        // Receptionist account
        User::updateOrCreate(
            ['email' => 'receptionist@clinic.com'],
            [
                'name'     => 'Receptionist',
                'email'    => 'receptionist@clinic.com',
                'password' => Hash::make('receptionist123'),
                'role'     => 'receptionist',
            ]
        );
    }
}