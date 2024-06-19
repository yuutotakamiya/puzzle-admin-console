<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerListController extends Controller
{
    public function PlayerList(Request $request)
    {

        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'player_name' => ['required', 'string', 'min:4', 'max:25'],
            'level' => ['required', 'integer', 'min:1', 'max:100'],
            'exp' => ['required', 'integer', 'min:1', 'max:1000000'],
            'life' => ['required', 'integer', 'min:1', 'max:100'],
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }
        if (!$request->session()->exists('login')) {
            return redirect('/');
        } else {
            $Players = Player::all();
            return view('accounts.playerList', ['accounts' => $Players]);
        }
    }
}
