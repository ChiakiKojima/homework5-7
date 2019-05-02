<?php
require_once '../PASS/config.php';

$orderCount = $_POST['order_count'];

try {
    if (empty($_GET['id'])) throw new Exception('ID不正');
    $id = (int) $_GET['id'];
    $dbh = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM merchandise WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $totalPrice = $result['price'] * $orderCount;
    $dbh = null;
    
} catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}

?> 

<!DOCTYPE html>
<html lang="ja">
<head><meta charset="utf-8">
<title>カートの中身</title>
<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<h1>カートの中身</h1>

<table>
    <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>数量</th>
        
    </tr>
    
    <tr>
        <td><?php echo htmlspecialchars($result['name'],ENT_QUOTES, 'UTF-8') ?></td>
        <td><?php echo htmlspecialchars($result['price'],ENT_QUOTES, 'UTF-8') ?>円</td>
        <td><?php echo htmlspecialchars($orderCount,ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    
</table>

<h2>合計金額   <?php echo htmlspecialchars($totalPrice,ENT_QUOTES, 'UTF-8') ?>円</h2>

</body>
</html>