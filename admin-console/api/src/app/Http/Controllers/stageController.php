<?php

namespace App\Http\Controllers;

use App\Http\Resources\StageResource;
use App\Models\Stage;
use App\Models\StageLog;
use Database\Seeders\StageTableSeeder;
use Illuminate\Http\Request;


class stageController extends Controller
{
    public function index(Request $request)
    {
        $stage = Stage::all();

        StageLog::create([
            'id'=>$request->id,
            'user_id'=>$request->user_id,
            'stage_id'=>$request->stage_id,
            'result'=>$request->result
        ]);

        return response()->json(StageResource::collection($stage));
    }

}
