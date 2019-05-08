<?php
/*課題 23
課題 21 のフォームで送信を行なった際、result.php で同一インデックスの 
id の値と quantity の値をペアで画面に表示してください。
期待される結果
10: 1
20: 2
30: 4
*/

/*print_r($_POST);
echo '<br>';*/

$length = count($_POST['id']);

for ($i=0; $i < $length; $i++) {
    echo $_POST['id'][$i].': '.$_POST['quantity'][$i].'<br>';
}

?>