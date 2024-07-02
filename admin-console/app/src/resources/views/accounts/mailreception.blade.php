@extends('layouts.app')
@section('title','ユーザー受信メール一覧')
@section('h1','ユーザー受信メール一覧')
@section('body')
    <form method="get" action="{{route('mailsuser_mail_list')}}">
        @csrf
        <div class="search">
            <input type="search" id="search-text" name="id" class="searchform"
                   placeholder="idを入力">
            <button id="searchBtn">検索</button>
            <input type="hidden" name="action" value="{{$items}}">
        </div>
    </form>
    @if($items !==null)
        {{$items->links('vendor.pagination.bootstrap-5')}}
        <table class="table table-bordered">
            @foreach($user as $users)
                @foreach($mails as $mail)
                    <tr>
                        <th>id</th>
                        <th>ユーザー名</th>
                        <th>メールのid</th>
                    </tr>
                    <tr>
                        <td>{{$mail['id']}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$mail['mail_id']}}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    @endif
@endsection


