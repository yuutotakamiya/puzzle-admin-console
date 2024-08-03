<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMailController;
use App\Http\Middleware\NoCacheMiddleware;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(NoCacheMiddleware::class)->group(function (){

    //ユーザー一覧
    Route::get('users/{user_id}',[UserController::class,'show'])->name('users.user-id');
    Route::get('users',[UserController::class,'index'])->name('user.index');

    //ユーザー登録
    Route::post('users/store',[UserController::class,'store'])->name('users.store');

    //ユーザーの更新
    Route::post('users/update',[UserController::class,'update'])->name('users.update');

    //アイテム一覧
    Route::get('items',[ItemController::class,'index'])->name('item.index');

    //メールマスター一覧
    Route::get('mails',[MailController::class,'index'])->name('mail.index');

    //ユーザーを所持アイテム一覧
    Route::get('user_items/{user_id}',[UserController::class,'show_user_itemList'])->name('user.show_user_item-list');

    //ユーザー受信メール一覧
    Route::get('user_mail/{user_id}',[UserMailController::class,'index'])->name('user-mail.index');

    //フォロー一覧
    Route::get('users_follow/{user_id}',[FollowController::class,'FollowList'])->name('follow.follow-list');

    //フォロー登録処理
    Route::post('users_follow/store',[FollowController::class,'store'])->name('users-follow.store');

    //フォローの解除処理
    Route::post('users_follow/delete/{user_id}',[FollowController::class,'destroy'])->name('users-follow.delete');

    //島のマスタ情報一覧
    Route::get('',[]);
});



