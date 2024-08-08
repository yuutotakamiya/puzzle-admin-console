<?php

namespace App\Http\Controllers;

use App\Http\Resources\blockResource;
use App\Models\block;
use App\Models\Land;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class blockController extends Controller
{
    //
    public function index(Request $request)
    {
        $block = block::where('land_id', '=', $request['land_id'])->get();

        return response()->json(blockResource::make($block));
    }

    //ブロックの情報を登録
    public function store(Request $request)
    {
        //バリデーションチェック
        $validator = Validator::make($request->all(),[
            'land_id'=>['required','string'],

        ]);
        if($validator->failed()){
            return response()->json($validator->errors(),400);
        }
        //例外エラー
        try{
            //トランザクション処理
            DB::transaction(function () use($request) {
                [
                    $block = block::create([
                        'land_id' => 1,
                        'block_user_id' => 1,
                        'type' => 'abc',
                        'x_Direction' => 0,
                        'z_Direction' => 0,
                    ])];
                return response()->json(['land_id' => $block->id]);
            });
        }catch (Exception $e){
            return response()->json($e, 500);
        }
    }
}
