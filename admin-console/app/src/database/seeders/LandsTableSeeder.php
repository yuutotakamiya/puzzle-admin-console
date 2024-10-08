<?php

namespace Database\Seeders;

use App\Models\land;
use Illuminate\Database\Seeder;

class LandsTableSeeder extends Seeder
{
    public function run(): void
    {
        Land::create([
            'multi_stage_id' => 1,
            'block_mission_num' => 100
        ]);
    }
}
