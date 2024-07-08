<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserMailResource;
use App\Models\User;
use App\Models\UserMail;
use Illuminate\Http\Request;


class UserMailController extends Controller
{
    public function index(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $user_mails = $user->mails;
        
        return response()->json(UserMailResource::collection($user_mails));


    }
}
