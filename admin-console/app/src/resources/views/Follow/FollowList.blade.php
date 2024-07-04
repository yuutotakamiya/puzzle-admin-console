@extends('layouts.app')
@section('title','フォロー一覧')
@section('h1','フォロー一覧')
@section('body')
    <form method="get" action="{{route('followsfollow')}}">
        @csrf
        <div class="search">
            <input type="search" id="search-text" name="id" class="searchform"
                   placeholder="idを入力">
            <button id="searchBtn">検索</button>
            <input type="hidden" name="action" value="follow">
        </div>
    </form>
    @if(!empty($User_follows))
        {{$User_follows->links('vendor.pagination.bootstrap-5')}}
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>ユーザー名</th>
            </tr>
            @foreach($User_follows as $User_follow)
                <tr>
                    <td>{{$User_follow['id']}}</td>
                    <td>{{$User_follow->name}}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection



