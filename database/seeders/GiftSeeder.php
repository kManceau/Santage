<?php

namespace Database\Seeders;

use App\Models\Gift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Gift::factory(20)->create();
        Gift::create([
            'name' => 'McLaren MCL38',
            'description' => 'Championne du monde',
            'good' => true,
            'category_id' => 1,
        ]);
        Gift::create([
            'name' => 'Playstation 5',
            'description' => 'Sale gamer.',
            'good' => true,
            'category_id' => 2,
        ]);
    }
}
