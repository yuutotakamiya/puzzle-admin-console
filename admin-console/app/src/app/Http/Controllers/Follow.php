<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Follow extends Controller
{
    //

    //フォロー一覧
    public function ShowFollowList(Request $request)
    {
        return view('Follow.FollowList');
    }

    //フォロー処理
    public function User_Follow()
    {
        $User_follows = Follow::select('follows.id', 'name')->join('users', 'users.id', '=', 'follows.user_id');
        return view('Follow.FollowList', ['$User_follows' => $User_follows]);
    }
}
