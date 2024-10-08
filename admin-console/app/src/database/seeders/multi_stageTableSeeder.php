<?php

namespace Database\Seeders;

use App\Models\multi_stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class multi_stageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { //
        multi_stage::create([
            'multi_stage_id' => 1,
            'user_id' => 1,
            'multi_block_num' => 100,
            'result' => 0,
        ]);
    }
}
