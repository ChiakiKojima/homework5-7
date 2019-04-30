<?php 
require_once ('PASS/config.php');


try {
    if(empty($_GET['name']))throw new Exception('商品名　不正');
   
    $name = $_GET['name'];
    $dbh = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM merchandise where name=?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindvalue(1, $name, PDO::PARAM_STR);
    $stmt->execute();
    $dbh = null;
    
    echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8')."の削除が完了しました。";
    echo "<a href='index.php'>商品一覧へ戻る</a>";
} catch (Exception $e) {
    echo "エラー発生：".htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8')."<br>";
    die();
}
?>
