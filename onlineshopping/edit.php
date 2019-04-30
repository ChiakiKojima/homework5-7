<?php 
require_once ('PASS/config.php');


try {
    if(empty($_GET['id']))throw new Exception('商品がありません');
   
    $id = $_GET['id'];
    $dbh = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM merchandise where id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindvalue(1, $id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    
    
} catch (Exception $e) {
    echo "エラー発生：".htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8')."<br>";
    die();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>編集フォーム</title>
</head>

<body>
    <h1>商品編集フォーム</h1>
    <form method="POST" action="update.php"> 
        商品名：<input type="text" name="name" value="<?php echo htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        商品説明：<textarea type="text" name="description"><?php echo htmlspecialchars($result['description'], ENT_QUOTES, 'UTF-8'); ?></textarea><br>
        価格：<input type="number" name="price" value="<?php echo htmlspecialchars($result['price'], ENT_QUOTES, 'UTF-8'); ?>">円<br>
        購入可否：
        <input type="radio" name="available" value="true" <?php if($result['available'] === 'true')echo "checked" ?>>可
        <input type="radio" name="available" value="false" <?php if($result['available'] === 'false')echo "checked" ?>>不可
        <br>
        
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($result['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="submit" value="送信">
    </form>
    <a href="index.php">商品一覧に戻る</a>
</body>
</html>    
