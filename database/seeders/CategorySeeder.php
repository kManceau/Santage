<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Category::factory(10)->create();
        Category::create([
            'name' => 'Voiture',
            'description' => 'Vroum vroum',
        ]);
        Category::create([
            'name' => 'Informatique',
            'description' => 'GLHF',
        ]);
        Category::create([
            'name' => 'Torture',
            'description' => 'C\'est interdit normalement...',
        ]);
        Category::create([
            'name' => 'Argent',
            'description' => 'Money, money, money',
        ]);
        Category::create([
            'name' => 'Voyage',
            'description' => 'Trop bien',
        ]);
    }
}
