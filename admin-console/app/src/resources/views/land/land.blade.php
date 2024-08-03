@extends('layouts.app')
@section('title','島のマスタ')
@section('h1','島のマスタ')
@section('body')
    <table class="table table-bordered">
        @if(!empty($land))
            <tr>
                <th>id</th>
                <th>ユーザーID</th>
                <th>島の名前</th>
            </tr>
            @foreach($land as $lands)
                <tr>
                    <td>{{$lands['id']}}</td>
                    <td>{{$lands['user_id']}}</td>
                    <td>{{$lands['land_name']}}</td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection



