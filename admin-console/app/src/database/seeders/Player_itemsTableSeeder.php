<?php

namespace Database\Seeders;

use App\Models\Player_item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Player_itemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Player_item::create([
            'Quantity_in_possession' => 20
        ]);
    }
}
