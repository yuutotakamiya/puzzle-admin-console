<?php

namespace App\Http\Controllers;

use App\Http\Resources\User_ItemResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //ユーザーをリストで表示
    public function index(Request $request)
    {
        //バリデーションチェック
        $validator = Validator::make($request->all(),[
            'min_level'=>['required','int'],
            'max_level'=>['required','int'],
        ]);
        if($validator->failed()){
            return response()->json($validator->errors(),400);
        }
        $users = User::where('level', '>=', 20)
            ->where('level', '<=', 30)
            ->orderby('level')
            ->get();
        return response()->json(
            UserResource::collection($users));
    }

    //idで表示
    public function show(Request $request)
    {
        $user = User::findOrfail($request->user_id);
        $response=[
            "detail"=>$user
        ];
        return response()->json(UserResource::make($user));
    }

    //ユーザーの所持アイテム一覧
    public function show_user_itemList(Request $request){

        //指定のユーザーを取得
        $user = User::findOrfail($request->user_id);

        //所持アイテムリストをリレーションで取得
        $items = $user->items;

        //中間テーブルのリソースを使いjson化
        $response =[
            "items"=>User_ItemResource::collection($items)
        ];
        return response()->json($response);
    }

    //ユーザー登録
    public function store(Request $request){
        //バリデーションチェック
        $validator = Validator::make($request->all(),[
            'name'=>['required','string'],

        ]);
        if($validator->failed()){
            return response()->json($validator->errors(),400);
        }
        $user = User::create([
           'name'=>$request->name,
           'level'=>0,
            'exp'=>0,
            'life'=>0,
        ]);
        return response()->json(['user_id'=>$user->id]);
    }

    //ユーザーの更新
    public function update(Request $request){
        //バリデーションチェック
        $validator = Validator::make($request->all(),[
            'name'=>['required','string'],
        ]);
        if($validator->failed()){
            return response()->json($validator->errors(),400);
        }

        $user = User::findOrFail($request->user_id);

        if(!empty($request->name)){
            $user->name = $request->name;
        }
        $user->save();

        return response()->json();
    }

}
