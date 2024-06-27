<!DOCTYPE html>
<html lang="ja">
<head>
    <title>アカウント削除完了</title>
<body>
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<h1>アカウント削除完了</h1>
<td>{{$name}}を削除完了しました</td>
<br>
<button type="button" onclick="location.href='{{route('accountsindex')}}'"
        name="destroybutton">ユーザーリストに戻る
</button>
</body>
</html>
