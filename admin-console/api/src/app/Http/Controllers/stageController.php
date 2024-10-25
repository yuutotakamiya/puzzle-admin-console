<?php

namespace App\Http\Controllers;

use App\Http\Resources\LandStatusResource;
use App\Http\Resources\StageResource;
use App\Http\Resources\Stage_logResource;
use App\Models\Stage;
use App\Models\User;
use App\Models\StageLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Validator;

class stageController extends Controller
{
    //ステージ毎の最短手数
    public function index(Request $request)
    {
        $stage_min_num = StageLog::where('stage_id','=',$request['stage_id'])
            ->where('result','=',1)
            ->min('min_hand_num');

        if(empty($stage_min_num)){
            return response()->json(['error'=>'null'],404);
        }else{
            return response()->json(['min_hand_num' => $stage_min_num]);
        }
    }

    //自身の最短手数
    public function show(Request $request)
    {

        $min_hand = StageLog::where('user_id','=',$request['user_id'])
            ->where('stage_id','=',$request['stage_id'])
            ->where('result','=',1)
            ->min('min_hand_num');

        if(empty($min_hand)){
            return response()->json(['error'=>'null'],404);
        }
        return response()->json(['min_hand_num' => $min_hand]);
    }

    //ステージクリアの登録
    public function store(Request $request)
    {
        //バリデーションチェック
        $validator = Validator::make($request->all(),[
            'stage_id'=>['required','int'],
            'user_id'=>['required','int']
        ]);
        if($validator->failed()){
            return response()->json($validator->errors(),400);
        }
        try{
            StageLog::create([
                'stage_id'=>$request->stage_id,
                'user_id'=>$request->user_id,
                'result'=>$request->result,
                'min_hand_num'=>$request->min_hand_num
            ]);
            return response()->json();
        }catch (Exception $e){
            return response()->json($e, 500);
        }
    }
}
