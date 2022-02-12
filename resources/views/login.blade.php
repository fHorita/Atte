<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/login.css">
  <title>ログイン</title>
</head>
<body>
  <header>
    <h1>Atte</h1>
  </header>
  <main>
    <h2>ログイン</h2>
    <p>{{$text}}</p>
    <form action="/login" method="post">
      @csrf
      <input type="email" value="" placeholder="メールアドレス" name="email">
      <input type="password" value="" placeholder="パスワード" name="password">
      <input type="submit" value="ログイン">
    </form>
    <p>アカウントをお持ちでない方はこちらから</p>
    <p><a href="/register">会員登録</a></p>
  </main>
  <footer>
    Atte,inc.
  </footer>
  
</body>
</html>
