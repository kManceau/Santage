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
        Gift::create([
            'name' => 'Fiat Multipla accidenté',
            'description' => 'Championne du monde',
            'good' => false,
            'category_id' => 1,
        ]);
        Gift::create([
            'name' => 'Une journée de discussion en tête à tête avec Macron',
            'description' => 'Horrible...',
            'good' => false,
            'category_id' => 3,
        ]);
        Gift::create([
            'name' => 'PC Gamer',
            'description' => 'RTX 4090, blablabla',
            'good' => true,
            'category_id' => 2,
        ]);
        Gift::create([
            'name' => '10 bitcoins',
            'description' => 'Oula ...',
            'good' => true,
            'category_id' => 4,
        ]);
        Gift::create([
            'name' => 'Une semaine de vacances en caravane',
            'description' => 'Ca doit être génial non ?',
            'good' => false,
            'category_id' => 5,
        ]);
    }
}
