<?php
/*課題 18
値として連想配列が設定された連想配列 
$a = ['fruits' => ['apple' => 400, 'banana' => 150, 'cherry' => 500],
'vegetables' => ['onion' => 120, 'carrot' => 240, 'potato' => 360]] を定義し、
キー 'vegetables' の値を画面に表示してください。
期待される結果
onion: 120
carrot: 240
potato: 360*/

$a = ['fruits' => ['apple' => 400, 'banana' => 150, 'cherry' => 500],
'vegetables' => ['onion' => 120, 'carrot' => 240, 'potato' => 360]];

foreach ($a[vegetables] as $vegetable => $price) {
    echo $vegetable.': '.$price.'<br>';
}