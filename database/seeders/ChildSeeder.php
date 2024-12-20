<?php

namespace Database\Seeders;

use App\Models\Child;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Child::factory(20)->create();
        Child::factory()->create([
           'first_name' => 'Hassan',
           'last_name' => 'El Haouat',
            'gender' => 'male',
        ]);
        Child::factory()->create([
            'first_name' => 'Lucas',
            'last_name' => 'Huchede',
            'gender' => 'male',
        ]);
        Child::factory()->create([
            'first_name' => 'Nadège',
            'last_name' => 'Gautier',
            'gender' => 'female',
        ]);
        Child::factory()->create([
            'first_name' => 'Pascal',
            'last_name' => 'Boucault',
            'gender' => 'male',
        ]);
        Child::factory()->create([
            'first_name' => 'Sullivan',
            'last_name' => 'Travers',
            'gender' => 'male',
        ]);
        Child::factory()->create([
            'first_name' => 'Thibault',
            'last_name' => 'Gabillard',
            'gender' => 'male',
        ]);
    }
}
