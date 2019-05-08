<?php

/*課題 10
空の連想配列 $a = array(); を定義し、任意のキーと値のペアを 3 つこの連想配列に追加してキーと値を画面
に表示してください。
期待される結果の例
tomato: 100
potato: 200
carrot: 300*/

$a = array();

$a[tomato] = 100;
$a[potato] = 200;
$a[carrot] = 300;

foreach($a as $vegetable => $price) {
    echo $vegetable.': '.$price.'<br>';
}
?>