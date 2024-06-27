<!DOCTYPE html>
<html lang="ja">
<head>
    <title>アカウント登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<h1>アカウント登録画面</h1>
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form method="post" action="{{route('accountsstore')}}">
    @csrf
    <input type="text" name="name" placeholder="名前を入力してください"><br>
    <input type="password" name="password" placeholder="パスワードを入力してください"><br>
    <input type="password" name="password" placeholder="パスワードを再入力してください"><br>
    <button type="submit">登録</button>
    <input type="hidden" name="action" value="store">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
