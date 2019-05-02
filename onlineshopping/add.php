<?php
require_once ('PASS/config.php');

$name = $_POST['name'];
$description = $_POST['description'];
$price = (int) $_POST['price'];
$available = $_POST['available'];

try {
    $dbh = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "INSERT INTO merchandise (name, description, price, available) VALUES (?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->bindValue(2, $description, PDO::PARAM_STR);
    $stmt->bindValue(3, $price, PDO::PARAM_INT);
    $stmt->bindValue(4, $available, PDO::PARAM_STR);
    $stmt->execute();
    
    $dbh = null;

} catch (Exception $e) {
    echo "エラー発生:" .htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') ."<br>";
    die();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head><meta charset="utf-8">
<title>削除完了</title>
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>商品が登録されました。</h1>
    <br>
    <a href='index.php'>商品一覧へ戻る</a>
</body>
</html>
