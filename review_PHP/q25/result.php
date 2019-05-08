<?php
/*課題 25
連想配列 $cart = ['10' => 5, '20' => 2, '30' => 3] が定義されているものとします。
課題 21 のフォームで送信を行なった際、result.php で同一インデックスの id の値をキー、quantity の値を値
とした連想配列 $a を作成し、$cart の各キーの値を $a の同一キーの値で上書きして $cart の値を print_r で画面に表示してください。
期待される結果
Array ( [10] => 1 [20] => 2 [30] => 4 )
*/

/*print_r($_POST);
echo '<br>';*/

$cart = ['10' => 5, '20' => 2, '30' => 3];

$length = count($_POST['id']);

$a = [];

for ($i=0; $i < $length; $i++) {
    $a[$_POST['id'][$i]] = $_POST['quantity'][$i];
    foreach ($cart as $id => $quantity) {
        $cart[$id][$i] = $_POST['quantity'][$i];
    }
}
print_r($cart);

?>