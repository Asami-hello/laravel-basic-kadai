<?php
// セッションの開始
session_start();

// セッションに保存された「お名前」の取得
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '名無し';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>

<body>


    <h2><?php echo $name; ?>様、お問い合わせを承りました。</h2>
    <p>ありがとうございました。今後の参考にさせていただきます。</p>
    <button id="back-btn" onclick="location.href='form.php';">戻る</button>

    <?php
    // セッション変数を初期化・終了
    $_SESSION = array();
    session_destroy();
    ?>
</body>
</html>