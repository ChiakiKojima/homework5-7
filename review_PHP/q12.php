<?php
/*課題 12
連想配列 $a = ['apple' => 400, 'banana' => 150, 'cherry' => 500] のキー 'banana' の値に 500 を足して、
print_r で画面に表示してください。
期待される結果
Array ( [apple] => 400 [banana] => 650 [cherry] => 500 )*/

$a = ['apple' => 400, 'banana' => 150, 'cherry' => 500];
$a[banana] += 500;
print_r($a);