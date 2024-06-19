<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Player::create([
            'player_name' => '勇者',
            'level' => 20,
            'exp' => 30,
            'life' => 100,
        ]);
    }
}
