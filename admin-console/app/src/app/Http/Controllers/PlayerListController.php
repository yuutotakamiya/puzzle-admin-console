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
        if (!$request->session()->exists('login')) {
            return redirect('/');
        } else {
            $Players = Player::all();
            return view('accounts.playerList', ['accounts' => $Players]);
        }
    }
}
