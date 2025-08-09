<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed a default manager account for first login
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'first_name' => 'Ahmed',
                'father_name' => '—',
                'last_name' => 'Manager',
                'role' => 'manager',
                'phone' => '0500000000',
                'registration_number' => 'MGR-0001',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
