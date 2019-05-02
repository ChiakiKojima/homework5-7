<!DOCTYPE html>
<html lang="ja">
<head><meta charset="utf-8">
<title>Handmade shop</title>
</head>

<body>
    <h1>商品一覧</h1>
    
<?php 
require_once ('../PASS/config.php');

try {
    $dbh = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM merchandise where available='true' order by id DESC";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
} catch (Exception $e) {
    echo "エラー発生：".htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8')."<br>";
    die();
}
?>

<table>
    <tr>
        <th>商品名</th>
        <th>商品説明</th>
        <th>価格</th>
    </tr>
    <?php foreach ($result as $row): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name'],ENT_QUOTES, 'UTF-8') ?></td>
        <td><?php echo htmlspecialchars($row['description'],ENT_QUOTES, 'UTF-8') ?></td>
        <td><?php echo htmlspecialchars($row['price'],ENT_QUOTES, 'UTF-8') ?>円</td>
        <td><a href="detail.php?id=<?php echo htmlspecialchars($row['id'],ENT_QUOTES, 'UTF-8') ?>">詳細</a>
    </tr>
    <?php endforeach ?>
</table>
</body>
</html>