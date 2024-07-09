<?php

namespace App\Http\Controllers;

use App\Http\Resources\FollowResource;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FollowController extends Controller
{
    //フォロー一覧
    public function FollowList(Request $request){

        //指定のユーザーを取得
        $user = User::findOrFail($request->user_id);

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
        $user = Follow::create([
            'id'=>$request->id,
            'user_id'=>1,
            'follow_user_id'=>4
        ]);
        return response()->json(['id'=>$user->id]);
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

        $user = User::findOrFail($request->user_id);

        $user->follows()->detach($request->follow_user_id);

        return response()->json(['フォローの解除しました']);
    }
}
