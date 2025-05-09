<?php

use App\Http\Controllers\blockController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\stageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMailController;
use App\Http\Middleware\NoCacheMiddleware;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(NoCacheMiddleware::class)->group(function (){

    //ユーザー一覧
    Route::get('users/{user_id}',[UserController::class,'show'])->middleware('auth:sanctum')->name('users.user.id');
    Route::get('users',[UserController::class,'index'])->middleware('auth:sanctum')->name('user.index');

    //ユーザー登録
    Route::post('users/store',[UserController::class,'store'])->name('users.store');

    //ユーザーの更新
    Route::post('users/update',[UserController::class,'update'])->middleware('auth:sanctum')->name('users.update');

    //既存のユーザーのAPIトークンの追加
    Route::post('users/Token',[UserController::class,'createToken'])->name('users.Token');

    //アイテム一覧
    Route::get('items',[ItemController::class,'index'])->middleware('auth:sanctum')->name('item.index');

    //メールマスター一覧
    Route::get('mails',[MailController::class,'index'])->middleware('auth:sanctum')->name('mail.index');

    //ユーザーを所持アイテム一覧
    Route::get('user_items/{user_id}',[UserController::class,'show_user_itemList'])->middleware('auth:sanctum')->name('user.show_user_item-list');

    //ユーザー受信メール一覧
    Route::get('user_mail/{user_id}',[UserMailController::class,'index'])->middleware('auth:sanctum')->name('user-mail.index');

    //フォロー一覧
    Route::get('users_follow/{user_id}',[FollowController::class,'FollowList'])->middleware('auth:sanctum')->name('follow.follow-list');

    //フォロー登録処理
    Route::post('users_follow/store',[FollowController::class,'store'])->middleware('auth:sanctum')->name('users-follow.store');

    //フォローの解除処理
    Route::post('users_follow/delete/{user_id}',[FollowController::class,'destroy'])->middleware('auth:sanctum')->name('users-follow.delete');

    //ステージ毎の最短手数
    Route::get('stage/{stage_id}',[stageController::class,'index'])->middleware('auth:sanctum')->name('stage.index');

    //自分自身の最短手数
    Route::get('min_hand_stage/{stage_id}/{user_id}',[stageController::class,'show'])->middleware('auth:sanctum')->name('stage.index');

    //最短手数の登録
    Route::post('stage/store',[stageController::class,'store'])->middleware('auth:sanctum')->name('stage.store');

    //島の情報一覧
    Route::get('land/index',[LandController::class,'index'])->middleware('auth:sanctum')->name('land.index');

    //島の詳細情報一覧
    Route::get('land/show/{land_id}',[LandController::class,'show'])->middleware('auth:sanctum')->name('land.show');

    //島の状況の登録
    Route::post('land_block/store',[LandController::class,'store'])->middleware('auth:sanctum')->name('land.store');

    //ブロックの情報一覧
    Route::get('block/{land_id}',[blockController::class,'index'])->middleware('auth:sanctum')->name('block.index');

    //ブロックの情報登録
    Route::post('block/store',[blockController::class,'store'])->middleware('auth:sanctum')->name('block.store');
});



