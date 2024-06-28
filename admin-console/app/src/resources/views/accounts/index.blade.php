<!DOCTYPE html>
<html lang="ja">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>ユーザー一覧</title>
</head>
<body>
<header class="p-3 text-bg-dark">
    <h1>ユーザー一覧</h1>
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{route('accountscreate')}}"
                       class="nav-link px-2 text-secondary">アカウント登録</a></li>
                <li><a href="{{route('accountsindex')}}" class="nav-link px-2 text-secondary">ユーザー一覧</a></li>
                <li><a href="{{route('accounts.userList')}}" class="nav-link px-2 text-white">プレイヤー一覧</a></li>
                <li><a href="{{route('accounts.itemList')}}" class="nav-link px-2 text-white">アイテム一覧</a></li>
                <li><a href="{{route('accounts.useritemList')}}" class="nav-link px-2 text-white">所持アイテム一覧</a>
            </ul>
            <div class="text-end">
                <form method="post" action="{{route('accountsindex')}}">
                    @csrf
                    <div class="search">
                        <input type="search" id="search-text" name="name" class="searchform"
                               placeholder="名前を入力">
                        <button id="searchBtn">検索</button>
                        <input type="hidden" name="action" value="search">
                    </div>
                </form>
                <form method="post" action="{{url('accounts/dologout')}}">
                    @csrf
                    <button class="btn btn-warning btn btn-primary w-100 py-2" type="submit">ログアウト
                    </button>
                    <input type="hidden" name="action" value="dologout">
                </form>
            </div>
        </div>
    </div>
</header>
<table class="table table-bordered">
    @foreach($accounts as $account)
        <tr>
            <td>id</td>
            <td>名前</td>
            <td>パスワード</td>
            <td>操作</td>
        </tr>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
