<?php
session_start();
require_once '../PASS/config.php';

//print_r($_POST);

try {
    if (empty($_POST['id'])) throw new Exception('ID不正');
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $length  = count($id);
    $rows = array();
    $subtotal = 0;   
    
    $dbh = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
    
    for ($i=0; $i < $length; $i++) {
        if (@$_POST['submit']) {
            @$_SESSION['cart'][$id[$i]] = $quantity[$i];
        }
        
        $sql = "SELECT * FROM merchandise WHERE id = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id[$i], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $result['quantity'] = $quantity[$i];
        $result['subtotal'] = $quantity[$i] * $result['price'];
        $sum += $result['subtotal']; 
        $rows[] = $result;
        
    }
  
    $dbh = null;
    $_SESSION['cart'] = null;
    
} catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
//print_r($rows);

?> 

<!DOCTYPE html>
<html lang="ja">
<head><meta charset="utf-8">
<title>注文完了</title>
<link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<h1>注文が完了しました</h1>

<table>
    <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>数量</th>
        <th>小計</th>
        
    <?php foreach ($rows as $r): ?> 
    </tr>
        <tr>
        <td ><?php echo htmlspecialchars($r['name'],ENT_QUOTES, 'UTF-8') ?></td>
        <td ><?php echo htmlspecialchars($r['price'],ENT_QUOTES, 'UTF-8') ?>円</td>
        <td ><?php echo htmlspecialchars($r['quantity'],ENT_QUOTES, 'UTF-8') ?>個</td>
        <td ><?php echo htmlspecialchars($r['subtotal'],ENT_QUOTES, 'UTF-8') ?>円</td>
    </tr>
    <?php endforeach ?>
</table>


<h2>合計金額</h2>   
<h3><?php echo htmlspecialchars($sum,ENT_QUOTES, UF-8) ?>円</h3>

<a href="index.php" class="to_index">商品一覧へ戻る</a>

</body>
</html>