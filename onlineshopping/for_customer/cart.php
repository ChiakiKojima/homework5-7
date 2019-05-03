<?php
session_start();
require_once '../PASS/config.php';



try {
    if (empty($_POST['id'])) throw new Exception('ID不正');
    $id = (int) $_POST['id'];

    $rows = array();
    $sum = 0;   
  
    $dbh = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
    if (@$_POST['submit']) {
    @$_SESSION['cart'][$id] += $_POST['num'];
    }
    foreach($_SESSION['cart'] as $id => $num) {
      
    $sql = "SELECT * FROM merchandise WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    // $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute(array($id));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $result['num'] = strip_tags($num);
    $sum += $num * $result['price'];
    $rows[] = $result;
    }
  
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
        <th>小計</th>
        
    <?php foreach ($rows as $r): ?>  
    </tr>
        <tr>
        <td><?php echo htmlspecialchars($r['name'],ENT_QUOTES, 'UTF-8') ?></td>
        <td><?php echo htmlspecialchars($r['price'],ENT_QUOTES, 'UTF-8') ?>円</td>
        <td><?php echo htmlspecialchars($r['num'],ENT_QUOTES, 'UTF-8') ?></td>
        <td><?php echo htmlspecialchars($r['num'] * $r[price],ENT_QUOTES, 'UTF-8') ?>円</td>
    </tr>
    <?php endforeach ?>
</table>

<h2>合計金額   <?php echo htmlspecialchars($sum,ENT_QUOTES, 'UTF-8') ?>円</h2>


<a href="cart_empty.php">カートを空にする</a>　
<a href='index.php' class="to_index">商品一覧へ戻る</a>

</body>
</html>