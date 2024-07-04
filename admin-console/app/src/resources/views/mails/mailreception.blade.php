@extends('layouts.app')
@section('title','ユーザー受信メール一覧')
@section('h1','ユーザー受信メール一覧')
@section('body')
    <table class="table table-bordered">
        @if(!empty($users))
            <tr>
                <th>id</th>
                <th>ユーザー名</th>
                <th>メールのid</th>
            </tr>
            @foreach($users->mails as $mail)
                <tr>
                    <td>{{$mail->id}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$mail->mail_id}}</td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection


