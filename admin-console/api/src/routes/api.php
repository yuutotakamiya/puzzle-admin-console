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

    //ステージのマスタ情報一覧
    Route::get('stage/{stage_id}',[stageController::class,'index'])->middleware('auth:sanctum')->name('stage.index');

    //マルチステージの登録
    Route::post('multi_stage',[stageController::class,'store'])->middleware('auth:sanctum')->name('multi-stage');

    //島の情報一覧
    Route::get('land',[LandController::class,'index'])->middleware('auth:sanctum')->name('land.index');

    //ブロックの情報一覧
    Route::get('block/{land_id}',[blockController::class,'index'])->middleware('auth:sanctum')->name('block.index');

    //ブロックの情報登録
    Route::post('block/store',[blockController::class,'store'])->middleware('auth:sanctum')->name('block.store');
});



