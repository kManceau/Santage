<?php

namespace Database\Seeders;

use App\Models\Child;
use App\Models\Gift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GiftChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $children = Child::all();
        foreach ($children as $child) {
            $child->gift()->attach(rand(1, Gift::count()));
        }
    }
}
