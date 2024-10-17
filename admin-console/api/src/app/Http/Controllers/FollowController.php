<?php

namespace App\Http\Controllers;

use App\Http\Resources\FollowResource;
use App\Models\Follow;
use App\Models\follow_logs;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class FollowController extends Controller
{
    //フォロー一覧
    public function FollowList(Request $request){

        //指定のユーザーを取得
        $user = User::find($request->user_id);

        //フォロー一覧をリレーションで取得
        $users = $user->follows;

        return response()->json(FollowResource::collection($users));
    }

    //フォローの登録
    public function store(Request $request)
    {
        //バリデーションチェック
        $validator = Validator::make($request->all(),[
            'id'=>['required','int'],
            'user_id'=>['required','int'],
            'follow_user_id'=>['required','int']
        ]);
        if($validator->failed()){
            return response()->json($validator->errors(),400);
        }
        $follow_user =Follow::where('user_id', '=', $request['user_id'])
        ->where('follow_user_id', '=', $request['follow_user_id'] )->get();
        //dd($follow_user);
        //同じ人をフォローしていなかったら
        if($follow_user->count() == 0) {
            //例外エラー
            try {
                //トランザクション処理
                DB::transaction(function () use ($request) {
                    $user = Follow::create([
                        'id' => $request->id,
                        'user_id' => $request->user_id,
                        'follow_user_id' => $request->follow_user_id
                    ]);

                    $logs = follow_logs::create([
                       'id'=>$request->id,
                       'user_id'=>$request->user_id,
                       'target_user_id'=>$request->follow_user_id,
                       'action'=>$request->action
                    ]);
                    return response()->json(['id' => $user->id,'user_id'=>$logs->id]);
                });
            } catch (Exception $e) {
                return response()->json($e, 500);
            }
        }
    }

    //フォローの解除
    public function destroy(Request $request){
        //バリデーションチェック
        $validator = Validator::make($request->all(),[
            'id'=>['required','int'],
            'user_id'=>['required','int'],
            'follow_user_id'=>['required','int']
        ]);
        if($validator->failed()){
            return response()->json($validator->errors(),400);
        }

        //例外エラー
        try{
            //トランザクション処理
            DB::transaction(function () use ($request){
            [$user = User::findOrFail($request->user_id),
            $user->follows()->detach($request->follow_user_id)];
            });
            follow_logs::create([
                'user_id'=>$request->user_id,
                'target_user_id'=>$request->follow_user_id,
                'action'=>$request->action
            ]);
            return response()->json(['フォローの解除しました']);
        }catch (Exception $e){
           return response()->json($e, 500);
        }
    }
}
