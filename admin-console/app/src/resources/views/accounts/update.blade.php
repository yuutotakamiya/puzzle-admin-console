<!DOCTYPE html>
<html lang="ja">
<head>
    <title>パスワード更新</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<h1>パスワード更新画面</h1>
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form method="post" action="{{route('accountsupdate')}}">
    @csrf
    {{$name}}<br>
    <input type="password" name="password" placeholder="パスワードを入力してください"><br>
    <input type="password" name="password_confirmation" placeholder="パスワードを再入力してください"><br>
    <button type="submit">更新</button>
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value={{$id}}{{$name}}>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
