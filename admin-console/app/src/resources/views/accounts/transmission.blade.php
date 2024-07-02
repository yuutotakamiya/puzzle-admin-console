@extends('layouts.app')
@section('title','メールの送信')
@section('h1','メールの送信')

@section('body')
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form method="post" action="{{route('mailsuser_mail_list')}}">
        @csrf
        <div class="form-floating">
            <label for="floatingInput">{{$user_mail_sends}}</label><br>
        </div>
        <div class="form-floating">
            <label></label><br>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">送信</button>
        <input type="hidden" name="action" value="{{}}">
    </form>
@endsection
