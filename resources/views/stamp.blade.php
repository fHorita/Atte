<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/stamp.css">
  <title>打刻</title>
</head>
<body>
  <header>
    <h1>Atte</h1>
    <div class="menu">
      <p><a href="/home">ホーム</a></p>
      <p><a href="/date">日付一覧</a></p>
      <p><a href="/logout">ログアウト</a></p>
    </div>
  </header>
  <main>
    <h2>
      @if (Auth::check())
        <p>{{$text}}</p>
      @else
        <p>{{$text}}（<a href="/login">ログイン</a>｜<a href="/register">登録</a>）</p>
      @endif
    </h2>
    <div class="container">
      <form action="/attendance_start" method="get">  
        <input id="startWork" type="submit" value="勤務開始">
      </form>
      <form action="/attendance_end" method="get">
        <input id="endWork" type="submit" value="勤務終了">
      </form>
      <form action="/break_start" method="get">
        <input id="startRest" type="submit" value="休憩開始">
      </form>
      <form action="/break_end" method="get">
        <input id="endRest" type="submit" value="休憩終了">
      </form>
    </div>
  </main>
  <footer>
    Atte,inc.
  </footer>
  
  <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>