<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\gameManagementController;
use App\Http\Controllers\ItemListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlayerItemListController;
use App\Http\Controllers\PlayerListController;
use Illuminate\Support\Facades\Route;

//ログイン画面を表示する
Route::get('/', [LoginController::class, 'index'])->name('login');
//echo md5('password');

//ログインする
Route::post('/', [LoginController::class, 'dologin'])->name('login');

//管理画面を表示する
Route::get('accounts/gameManagement', [gameManagementController::class, 'gameManagement']);

//ユーザー一覧を表示する
Route::get('accounts/index', [AccountController::class, 'index']);

//ユーザーの名前を検索して表示
Route::get('account/index', [AccountController::class, 'seach'])->name('account/index');

//プレイヤー一覧を表示する
Route::get('accounts/playerList', [PlayerListController::class, 'PlayerList']);

//アイテム一覧を表示する
Route::get('accounts/itemList', [ItemListController::class, 'ItemList']);

//所持アイテム一覧を表示する
Route::get('accounts/playeritemList', [PlayerItemListController::class, 'Playeritem'])->name('player.item');

//ログアウトする
Route::post('accounts/dologout', [LoginController::class, 'dologout']);

