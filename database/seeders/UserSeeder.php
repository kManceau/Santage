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
            'name' => 'elf',
            'password' => Hash::make('elf2024!'),
            'email' => 'elf@truc.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'elf'
        ]);

        User::create([
            'name' => 'santa',
            'password' => Hash::make('santa2024!'),
            'email' => 'santa@truc.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'santa'

        ]);
        User::factory(4)->create();
    }
}
