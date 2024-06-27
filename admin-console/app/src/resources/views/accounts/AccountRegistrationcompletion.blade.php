<!DOCTYPE html>
<html lang="ja">
<head>
    <title>アカウント登録完了</title>
<body>
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<h1>アカウント登録完了</h1>
<td>{{$name}}を登録しました</td>
<br>
<button type="button" onclick="location.href='{{route('accountsindex')}}'"
        name="destroybutton">ユーザー一覧へ戻る
</button>
</body>
</html>
