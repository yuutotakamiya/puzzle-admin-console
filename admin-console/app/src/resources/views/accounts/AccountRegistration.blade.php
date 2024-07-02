@extends('layouts.app')
@section('title','アカウント登録')
@section('h1','アカウント登録')

@section('body')
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form method="post" action="{{route('accountsstore')}}">
        @csrf
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name">
            <label for="floatingInput">名前を入力してください</label><br>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                   name="password">
            <label for="floatingInput">パスワードを入力してください</label><br>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password_confirmation"
                   placeholder="password"><br>
            <label for="floatingInput">パスワードを再入力してください</label><br>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">登録</button>
        <input type="hidden" name="action" value="store">
    </form>
@endsection

