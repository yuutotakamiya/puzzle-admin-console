<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Database\Seeders\StageTableSeeder;

class stageController extends Controller
{
    public function index()
    {
        $stage = Stage::all();

        return view('stage.stage', ['stage' => $stage]);

    }
}
