<?php

namespace Database\Seeders;

use App\Models\land;
use Illuminate\Database\Seeder;

class landsTableSeeder extends Seeder
{
    public function run(): void
    {
        Land::create([
            'user_id' => 1,
            'land_name' => 'ウォーターセブン'
        ]);
    }
}
