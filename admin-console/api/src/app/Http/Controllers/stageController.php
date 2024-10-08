<?php

namespace App\Http\Controllers;

use App\Http\Resources\Multi_StageResource;
use App\Http\Resources\StageResource;
use App\Http\Resources\Stage_logResource;
use App\Models\multi_stage;
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

    //マルチステージの登録
    public function store(Request $request)
    {
        try{
            $Multi_stage = multi_stage::create([
                'multi_stage_id' => $request->multi_stage_id,//マルチステージID
                'user_id' => 1,//ユーザーID
                'multi_block_num' => 10,//マルチステージでブロックを埋めた数
                'result' => 0//完了したかどうか
            ]);
            return response()->json(['multi_stage_id' => $Multi_stage->id]);
        }catch (Exception $e){
            return response()->json($e, 500);
        }
    }
}
