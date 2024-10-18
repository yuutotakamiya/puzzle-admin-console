<?php

namespace App\Http\Controllers;

use App\Http\Resources\LandStatusResource;
use App\Http\Resources\StageResource;
use App\Http\Resources\Stage_logResource;
use App\Models\multi_stage;
use App\Models\Stage;
use App\Models\User;
use App\Models\StageLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use function Laravel\Prompts\error;

class stageController extends Controller
{
    //ステージ毎の最短手数
    public function index(Request $request)
    {
        $stage_min_num = StageLog::where('stage_id','=',$request['stage_id'])->min('min_hand_num');

        $Stage_min_num = ['min_hand_num' => $stage_min_num ];
        return response()->json($Stage_min_num);
    }

    //自身の最短手数
    public function show(Request $request)
    {
        $min_hand = StageLog::where('user_id','=',$request['user_id'])
            ->where('stage_id','=',$request['stage_id'])
            ->min('min_hand_num');

        $Stage_hand__min_num = ['min_hand_num' => $min_hand];
        if(empty($min_hand)){
            return response()->json(['error'=>'nullです'],404);
        }
        return response()->json(['min_hand_num' => $min_hand]);
    }
}
