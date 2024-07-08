@extends('layouts.app')
@section('title','フォロー一覧')
@section('h1','フォロー一覧')
@section('body')
    <form method="get" action="{{route('followsfollow_List')}}">
        @csrf
        <div class="search">
            <input type="search" id="search-text" name="id" class="searchform"
                   placeholder="idを入力">
            <button id="searchBtn">検索</button>
        </div>
    </form>
    @if(!empty($user))
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>フォローしたユーザー名</th>
                <th>フォローされたユーザー名</th>

            </tr>
            @foreach($user->follows as $User_follow)
                <tr>
                    <td>{{$User_follow->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$User_follow->name}}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection



