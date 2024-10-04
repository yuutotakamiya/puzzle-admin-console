<?php

namespace App\Http\Controllers;

use App\Http\Resources\StageResource;
use App\Http\Resources\Stage_logResource;
use App\Models\Stage;
use App\Models\User;
use App\Models\StageLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class stageController extends Controller
{
    public function index(Request $request)
    {
        $stage_min_num = StageLog::where('stage_id','=',$request['stage_id'])->min('min_hand_num');

        $Stage_min_num = ['min_hand_num' => $stage_min_num ];
        return response()->json($Stage_min_num);
    }

}
