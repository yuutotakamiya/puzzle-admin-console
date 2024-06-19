<?php

namespace App\Http\Controllers;

use App\Models\Player_item;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class PlayerItemListController extends Controller
{
    //所持アイテム一覧を表示する
    public function Playeritem(Request $request)
    {
        if (!$request->session()->exists('login')) {
            return redirect('accounts/login');

        } else {
            // プレイヤーテーブルとアイテムテーブルと所持個数を結合して取得
            $playerItems = Player_item::join('players', 'player_items.id', '=', 'players.id')
                ->join('items', 'player_items.id', '=', 'items.id')
                ->select('player_items.id', 'players.player_name as player_name', 'items.item_name',
                    'player_items.Quantity_in_possession')
                ->get();
            return view('accounts/playeritemList', ['accounts' => $playerItems]);
        }
    }
}
