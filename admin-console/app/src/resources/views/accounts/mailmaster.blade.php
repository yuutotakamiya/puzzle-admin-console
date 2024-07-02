@extends('layouts.app')
@section('title','メールマスタ')
@section('h1','メールマスタ')
@section('body')
    <table class="table table-bordered">
        @foreach($mails as $mail)
            <tr>
                <th>id</th>
                <th>アイテム名</th>
                <th>本文</th>
            </tr>
            <tr>
                <td>{{$mail['id']}}</td>
                <td>{{$mail['item_name']}}</td>
                <td>{{$mail['text_message']}}</td>
            </tr>
        @endforeach
    </table>
@endsection


