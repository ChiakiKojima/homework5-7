<?php
/*課題 9
連想配列 $a = ['apple' => 400, 'banana' => 150, 'cherry' => 500] のキーと値を画面に表示してください。*/

$a = ['apple' => 400, 'banana' => 150, 'cherry' => 500];

foreach ($a as $fruit => $price) {
    echo $fruit.': '.$price.'<br>';
}