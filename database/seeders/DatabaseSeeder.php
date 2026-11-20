<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::insert([
           [ 
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Ganti dengan password yang diinginkan
            ],
        [
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('12345678'), // Ganti dengan password yang diinginkan
        ]
    ]);
    }
}
