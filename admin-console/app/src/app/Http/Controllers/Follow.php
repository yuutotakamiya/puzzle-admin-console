<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Follow extends Controller
{
    //id検索
    public function ShowFollowList(Request $request)
    {
        if (!empty($request->id)) {

            $frg = User::where('id', '=', $request['id'])->exists();

            if ($frg === true) {
                $user = User::find($request->id);
            }
        }
        return view('Follow.FollowList', ['user' => $user ?? null]);
    }
}
