<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>
<body>
    <p>
        <?php
        //クラスを定義する
        class Product {
            //プロパティを定義する
            public $name;

            // メソッドを定義する
            public function set_name (string $name) {
                $this->name = $name;
            }
            public function show_name () {
                echo $this->name . '<br>';
            }
        }

        // インスタント化する
        $coffee = new Product();

        // メソッドにアクセスして実行する
        $coffee->set_name('コーヒー');
        $coffee->show_name();


        // インスタント化する
        $shampoo = new Product();

        //  プロパティにアクセスし、値を代入する 
        $shampoo->name = 'シャンプー';

        // プロパティにアクセスし、値を出力する 
        echo $shampoo->name;
        ?>
    </p>
    <p>
        <?php
        // クラスを定義する
        class User {
            // プロパティを定義する
            private $name;
            private $age;
            private $gender;

            // コントラクトを定義する
            public function __construct(string $name, int $age, string $gender) {
                $this -> name = $name;
                $this -> age = $age;
                $this -> gender = $gender;
            }
        }

        // インスタント化する
        $user = new User('侍太郎', 36, '男性');

        // インスタンス$userの各プロパティの値を出力する
        print_r($user);
        ?>
    </p>
    <p>
        <?php
        class Event {
            public $name;
            public $date;
            public $location;

            // コンストラクタ
            public function __construct(string $name, string $date, string $location) {
                $this->name = $name;
                $this->date = $date;
                $this->location = $location;
            }

            // 開催日までの日数を返すメソッド
            public function getDaysUntilEvent(): int {
                $today = new DateTime();
                $eventDate = new DateTime($this->date);
                $interval = $today->diff($eventDate);
                return (int)$interval->format('%r%a'); // 負数も含めるため%rを使用
            }
        }

        // --- 実行例 ---

        // イベントのインスタンス生成
        $event = new Event(
            "プログラミング初心者向けセミナー",
            "2025-07-10", // ← 現在より未来の日付（適宜変更可能）
            "東京国際フォーラム"
        );

        // 各プロパティに直接アクセスして出力
        echo "イベント名: " . $event->name . PHP_EOL . "<br>";
        echo "開催日: " . $event->date . PHP_EOL . "<br>";
        echo "開催場所: " . $event->location . PHP_EOL . "<br>";

        // 開催日までの日数を出力
        $days = $event->getDaysUntilEvent();
        echo "開催日まであと {$days} 日です。" . PHP_EOL;
        ?>
    </p>
    
</body>
</html>