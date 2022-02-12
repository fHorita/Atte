<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/date.css">
  <title>日付一覧</title>
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
    <h2><a href="previous_day/{{session('date')}}">&lt;</a>{{session('date')}}<a href="next_day/{{session('date')}}">&gt;</a></h2>
    
    <table>
      <tr>
        <th>名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
      </tr>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->user->getUserName() }}</td>
        <td>{{ $item->getStartTime() }}</td>
        <td>{{ $item->getEndTime() }}</td>
        <td>
          @if($item->rests != null)
            {{ $item->rests->getRestTime() }}
          @else
            休憩取りなさい！
          @endif
        </td>
        <td>{{ $item->getAttendanceTime() }}</td>
      </tr>
      @endforeach

    </table>
    {{ $items->links() }}

  </main>
  <footer>
    Atte,inc.
  </footer>
  
</body>
</html>
