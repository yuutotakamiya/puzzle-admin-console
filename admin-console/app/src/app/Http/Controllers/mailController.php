<?php

namespace App\Http\Controllers;

use App\Models\Mail;
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
        $user_mail = UserData::select([
            'user_mails.id as user_mail_id',
            'users.name as user_name',
            'mails.id as mail_id'
        ])
            ->join('users', 'users.id', '=', 'user_mails.user_id')
            ->join('mails', 'mails.id', '=', 'user_mails.mail_id')
            ->get();

        return view('accounts.mailreception', ['accounts_mail' => $user_mail]);
    }
}
