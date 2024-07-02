@extends('layouts.app')
@section('title','所持アイテム一覧')
@section('h1','所持アイテム一覧')
@section('body')
    <table class="table table-bordered">
        @foreach($accounts as $Player_itemList)
            <tr>
                <th>id</th>
                <th>プレイヤーの名前</th>
                <th>アイテムの名前</th>
                <th>所持個数</th>
            </tr>
            <tr>
                <td>{{$Player_itemList['id']}}</td>
                <td>{{$Player_itemList['user_name']}}</td>
                <td>{{$Player_itemList['item_name']}}</td>
                <td>{{$Player_itemList['Quantity_in_possession']}}</td>
            </tr>
        @endforeach
    </table>
@endsection


