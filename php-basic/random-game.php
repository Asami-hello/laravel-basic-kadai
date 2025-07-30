<?php
// セッションの開始（乱数を保持するために使用）
session_start();

// セッションに乱数がなければ生成する
if (!isset($_SESSION['answer'])) {
    $_SESSION['answer'] = mt_rand(1, 100);
}

$message = "";

// フォームが送信された場合の処理
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $guess = isset($_POST['guess']) ? (int)$_POST['guess'] : null;

    if ($guess < 1 || $guess > 100) {
        $message = "数字は1から100の間で入力してください。";
    } elseif ($guess > $_SESSION['answer']) {
        $message = "もっと小さいです！";
    } elseif ($guess < $_SESSION['answer']) {
        $message = "もっと大きいです！";
    } else {
        $message = "正解です！おめでとうございます！";
        // 正解したので、ゲームをリセット
        unset($_SESSION['answer']);
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>数字あてゲーム</title>
</head>
<body>
    <h1>数字あてゲーム</h1>
    <p>1から100の間の数字を当ててください。</p>

    <form method="post">
        <input type="number" name="guess" min="1" max="100" required>
        <button type="submit">送信</button>
    </form>

    <p><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
</body>
</html>