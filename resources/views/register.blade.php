<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/register.css">
  <title>会員登録</title>
</head>
<body>
  <header>
    <h1>Atte</h1>
  </header>
  <main>
    <h2>会員登録</h2>
    <form action="/register" method="post">
      @csrf
      @if ($errors->has('name'))
      <p>{{$errors->first('name')}}</p>
      @endif
      <input type="text" value="" placeholder="名前" name="name">
      @if ($errors->has('email'))
      <p>{{$errors->first('email')}}</p>
      @endif
      <input type="email" value="" placeholder="メールアドレス" name="email">
      @if ($errors->has('password'))
      <p>{{$errors->first('password')}}</p>
      @endif
      <input type="password" value="" placeholder="パスワード" name="password">
      @if ($errors->has('password_confirmation'))
      <p>{{$errors->first('password_confirmation')}}</p>
      @endif
      <input type="password" value="" placeholder="確認用パスワード" name="password_confirmation">
      <input type="submit" value="会員登録">
    </form>
    <p>アカウントをお持ちの方はこちらから</p>
    <p><a href="/login">ログイン</a></p>
  </main>
  <footer>
    Atte,inc.
  </footer>
  
</body>
</html>