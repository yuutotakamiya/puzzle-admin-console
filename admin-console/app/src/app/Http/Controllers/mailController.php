<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;

class mailController extends Controller
{
    //メールマスタの表示
    public function mail_index(Request $request)
    {
        $mail = Mail::all();

        return view('accounts.mailmaster', ['mails' => $mail]);
    }

    //ユーザー受信メール一覧表示
    public function user_mailList(Request $request)
    {
        $user = User::find($request->id);
        if (!empty($user)) {
            $mails = $user->mails()->paginate(3);
            $mails->appends(['id' => $request->id]);
        }
        return view('accounts.mailreception', ['user' => $user, 'items' => $items ?? null]);
    }

    //ユーザーにメールを送信する処理
    public function send(Request $request)
    {
        $user_mail_send = User::find(2);
        return view('accounts.transmission', ['user_mail_sends' => $user_mail_send]);

    }
}
