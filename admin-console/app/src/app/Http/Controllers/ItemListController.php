<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ItemListController extends Controller
{
    public function ItemList(Request $request)
    {
        // セッションチェック
        if (!$request->session()->exists('login')) {
            return redirect('accounts/login');
        }

        //アイテムリストのデータを全て取得
        $items = Item::all();
        return view('accounts.itemList', ['accounts' => $items]);

    }
}
