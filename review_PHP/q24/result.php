<?php
/*課題 24
課題 21 のフォームで送信を行なった際、result.php で
同一インデックスの id の値をキー、quantity の値を値とした連想配列 $a を作成し、
print_r で画面に表示してください。
期待される結果
Array ( [10] => 1 [20] => 2 [30] => 4 )
*/

/*print_r($_POST);
echo '<br>';*/

$length = count($_POST['id']);

$a = [];

for ($i=0; $i < $length; $i++) {
    $a[$_POST['id'][$i]] = $_POST['quantity'][$i];
}
print_r($a);
?>