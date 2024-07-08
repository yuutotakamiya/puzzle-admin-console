<?php

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
    Route::get('users/{user_id}',[UserController::class,'show'])->name('');
    Route::get('users',[UserController::class,'index'])->name('user.index');

    //アイテム一覧
    Route::get('items',[ItemController::class,'index'])->name('item.index');

    //メールマスター一覧
    Route::get('mails',[MailController::class,'index'])->name('mail.index');

    //ユーザーを所持アイテム一覧
    Route::get('user_items/{user_id}',[UserController::class,'show_user_itemList'])->name('user.show_user_item-list');

    //ユーザー受信メール一覧
    Route::get('user_mail/{user_id}',[UserMailController::class,'index'])->name('user-mail.index');
});


