@extends('layouts.app')
@section('title','アカウント一覧')
@section('h1','アカウント一覧')

@section('body')
    {{$accounts->links('vendor.pagination.bootstrap-5')}}
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>名前</td>
            <td>パスワード</td>
            <td>操作</td>
        </tr>
        @foreach($accounts as $account)
            <tr>
                <td>{{$account['id']}}</td>
                <td>{{$account['name']}}</td>
                <td>{{$account['password']}}</td>
                <form method="post" action="{{route('accountsaccount_destroy')}}">
                    @csrf
                    <td>
                        <button type="submit" onclick="location.href='{{route('accountsaccount_destroy')}}'"
                                name="destroybutton">削除
                        </button>
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value={{$account['id']}}>
                    </td>
                </form>
                <form method="post" action="{{route('accountspassword_update')}}">
                    @csrf
                    <td>
                        <button type="submit" onclick="location.href='{{route('accountspassword_update')}}'"
                                name="destroybutton">更新
                        </button>
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id"
                               value={{$account['id']}} {{$account['name']}} {{$account['password']}}>
                    </td>
                </form>
            </tr>
        @endforeach
    </table>
@endsection
