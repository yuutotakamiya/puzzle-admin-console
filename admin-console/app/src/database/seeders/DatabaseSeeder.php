<?php

namespace Database\Seeders;

use App\Http\Controllers\PlayerListController;
use App\Models\Account;
use App\Models\Player;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AccountsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
        $this->call(Player_itemsTableSeeder::class);
    }
}
