<?php
/*課題 22
課題 21 のフォームで送信を行なった際、result.php で $_POST のキー 'id' の要素数を画面に表示してくださ
い。
期待される結果
3*/

/*print_r($_POST);
echo '<br>';*/

echo count($_POST['id']);

?>