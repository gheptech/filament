<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (! User::where('email', 'gheptech@gmail.com')->exists()) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'gheptech@gmail.com',
                'password' => Hash::make('password'), // ganti dengan password aman
            ]);
        }
    }
}