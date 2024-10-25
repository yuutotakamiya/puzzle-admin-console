<?php

namespace App\Http\Controllers;

use App\Http\Resources\User_ItemResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use http\Env\Response;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;

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
        $users = User::where('level', '>=', 1)
            ->where('level', '<', 30)
            ->orderby('level')
            ->get();
        return response()->json(
            UserResource::collection($users));
    }

    //idで表示
    public function show(Request $request)
    {
        $user = User::findOrfail($request->id);
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
        //例外エラー
        try{
            //トランザクション処理
            $user = DB::transaction(function () use($request) {
                [
                $user = User::create([
                    'name' => $request->name,
                    'level' => 0,
                    'exp' => 0,
                    'life' => 0,
                ])];
                return $user;
            });
            //トークンの生成
            $token = $user->createToken($request->name)->plainTextToken;
            //トークンとユーザーIDをjsonで返す
            return response()->json(['user_id' => $user->id,'token'=>$token]);
        }catch (Exception $e){
            return response()->json($e, 500);
        }
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
        try{
            DB::transaction(function () use($request){
                $user = User::findOrFail($request->user_id);
                if(!empty($request->name)){
                    $user->name = $request->name;
                }
                $user->save();
            });
            return response()->json();
        }catch (Exception $e){
            return response()->json($e, 500);
        }
    }

    //既存ユーザーのトークンの生成
    public function createToken(Request $request)
    {
        //トークンが保存されているか確認
        $token = PersonalAccessToken::where('tokenable_id','=',$request->user_id)->first();
        //トークンがnullの場合
        if($token==null){
            $user = User::findOrFail($request->user_id);
            //APIトークンを生成
            $token =$user->createToken($user->name)->plainTextToken;
            //APIトークンとユーザーIDをjsonで返す
            return response()->json(['user_id' => $user->id,'token'=>$token]);
        }else{
            return Response()->json();
        }
    }
}
