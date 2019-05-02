<?php
require_once '../PASS/config.php';

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
    
    echo htmlspecialchars($result['name'],ENT_QUOTES, 'UTF-8') . "<br>\n";
    echo htmlspecialchars($result['description'],ENT_QUOTES, 'UTF-8') . "<br>\n";
    echo htmlspecialchars($result['price'],ENT_QUOTES, 'UTF-8').'円' . "<br>\n";
    
    $dbh = null;
    
} catch (Exception $e) {
    echo "エラー発生: ". htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head><meta charset="utf-8">
<title>detail</title>
<link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <form method="post" action="cart.php?id=<?php echo htmlspecialchars($result['id'],ENT_QUOTES, 'UTF-8') ?>">
        <input type="number" name="order_count" value="0" max="9"　min="1"><span>個</span>
        
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <br>
        <input class="cart" type='submit' value='カートに入れる'> 
    </form>
    
    <a href='index.php' class="to_index">商品一覧へ戻る</a>
</body>
</html>
