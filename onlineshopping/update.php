<?php 
require_once ('PASS/config.php');

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$available = $_POST['available'];

try {
    if(empty($_POST['id']))throw new Exception('ID　不正');
   
    $id = (int)$_POST['id'];
    $dbh = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE merchandise SET name=?, description=?, price=?, available=? where id=?";
    $stmt = $dbh->prepare($sql);
    
    $stmt->bindvalue(1, $name, PDO::PARAM_STR);
    $stmt->bindvalue(2, $description, PDO::PARAM_STR);
    $stmt->bindvalue(3, $price, PDO::PARAM_INT);
    $stmt->bindvalue(4, $available, PDO::PARAM_STR);
    $stmt->bindvalue(5, $id, PDO::PARAM_INT);
    
    $stmt->execute();
    
    $dbh = null;
    
} catch (Exception $e) {
    echo "エラー発生：".htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8')."<br>";
    die();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head><meta charset="utf-8">
<title>変更完了</title>
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8')?>の更新が完了しました</h1>
    <br>
    <a href='index.php'>商品一覧へ戻る</a>
</body>
</html>
