<?php

namespace Database\Seeders;

use App\Models\Player_item;
use App\Models\User_item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User_itemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User_item::create([
            'user_id' => 1,
            'item_id' => 1,
            'Quantity_in_possession' => 20
        ]);
    }
}
