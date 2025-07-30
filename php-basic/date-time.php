<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>

<body>
    <p>
        <?php
        // 使用するデフォルトのタイムゾーンを指定する
        date_default_timezone_set('Asia/Tokyo');

        // 現在の日時を指定したフォーマットで出力する
        echo date('Y年n月j日H時i分s秒') . '<br>';

        // 現在を基準として1週間後の日時のUNIXタイムスタンプを出力する
        echo strtotime('+1 week') . '<br>';
        
        // 現在を基準として3年前の日時を指定したフォーマットで出力する
        echo date('Y/m/d H:i:s', strtotime('-3 year')) . '<br><br>';

        date_default_timezone_set('Asia/Tokyo');
        echo "現在の日時は" . date('Y-m-d H:i:s') . "です。<br>";
        echo "今から1週間後の日時は" . date('Y-m-d H:i:s', strtotime('+1 week')) . 'です。<br>';

        ?>
    </p>
    <p>
        <?php
        // 指定した日時のインスタンスを作成する
        $date_time = new DateTime('2025-3-19 12:15:30');

        // インスタンス$date_timeの日時を特定のフォーマットで出力する
        echo $date_time -> format('Y年n月j日H時i分s秒') . '<br>';

        // 現在の日時のインスタンスを作成する
        $now = new DateTime();

        // diff()メソッドで2つのインスタンスの日時の差を取得し、変数$intervalに代入する（interval=間隔）
        $interval = $now -> diff($date_time);

        // 取得した日時の差を特定のフォーマットで出力する
        echo $interval -> format('%y年と%m月と%d日の差があります。総日数は%aです。');
        ?>
    </p>
    <p>
        <?php
        // 加算・減算してもインスタン$nowの日時が変わらないようにDateTimeImmutableクラスを使って作成する。
        $now = new DateTimeImmutable();

        // 現在の日時に1年を加算し、変数$addに代入する
        $add = $now -> modify('+1 year');

        // 現在の日時から3日を減算し、変数$subに代入する（sub=「減算」を意味するsubtractionの着）
        $sub = $now -> modify('-3 day');

        // 加算・減算した日時を特定のフォーマットで出力する
        echo $add -> format('現在から1年後はY年n月j日H時i分s秒です。').'<br>';
        echo $sub -> format('現在から3日前はY年n月j日H時i分s秒です。').'<br>';
        ?>
    </p>
    <p>
        <?php
        // 付き合った日数カウント作ってみる
        // 付き合った日
        $date_start = new DateTime('2023-4-21');
        // 今日の日付
        $now = new DateTime();
        // 何日たっているかの計算
        $date_count = $now -> diff($date_start);
        // 出力
        echo $date_count -> format("本日でお付き合いしてから %a 日です！");
        ?>
    </p>
    
</body>
</html>