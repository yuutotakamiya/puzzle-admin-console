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
        $request->session()->put('login', true);
        if (!$request->session()->exists('login')) {
            return redirect('accounts/login');

        } else {
            $Player_item = Player_item::join('Items', 'Player_item.id', '=', 'Items.id')->get();
            return view('accounts/playeritemList', ['accounts' => $Player_item]);
        }
    }
}
