<?php

/*課題 11
連想配列 $a = ['apple' => 400, 'banana' => 150, 'cherry' => 500] を定義し、この連想配列にキー 'peach'、値
300 の要素を追加してキーと値を画面に表示してください。
期待される結果
apple: 400
banana: 150
cherry: 500
peach: 300*/

$a = ['apple' => 400, 'banana' => 150, 'cherry' => 500];
$a[peach] = 300;

foreach ($a as $fruit => $price) {
    echo $fruit.': '.$price.'<br>';
}