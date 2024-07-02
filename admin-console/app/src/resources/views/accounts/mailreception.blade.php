@extends('layouts.app')
@section('title','ユーザー受信メール一覧')
@section('h1','ユーザー受信メール一覧')
@section('body')
    {{$accounts->links('vendor.pagination.bootstrap-5')}}
    <table class="table table-bordered">
        @foreach($accounts_mail as $account_mail)
            <tr>
                <th>id</th>
                <th>ユーザー名</th>
                <th>メールのid</th>
            </tr>
            <tr>
                <td>{{$account_mail['id']}}</td>
                <td>{{$account_mail['user_name']}}</td>
                <td>{{$account_mail['user_mail_id']}}</td>
            </tr>
        @endforeach
    </table>
@endsection


