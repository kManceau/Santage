<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Santa',
            'password' => Hash::make('santa2024!'),
            'email' => 'santa@truc.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'santa'
        ]);
        User::create([
            'name' => 'Kevin',
            'password' => Hash::make('kevin2024!'),
            'email' => 'kevin@truc.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'elf'
        ]);
        User::create([
            'name' => 'Lev',
            'password' => Hash::make('lev2024!'),
            'email' => 'lev@truc.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'elf'
        ]);
//        User::factory(4)->create();
    }
}
