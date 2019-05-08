<?php
/*課題 14
配列 $a = ['apple', 'banana', 'cherry']、$b = [100, 200, 300] を定義し、同一インデックスの $a の値をキー、
$b の値を値とした新しい連想配列 $c を作成し、$c を関数 print_r で画面に表示してください。
期待される結果
Array ( [apple] => 100 [banana] => 200 [cherry] => 300 )
課題*/

$a = ['apple', 'banana', 'cherry'];
$b = [100, 200, 300];

$c = [];

$length = count($a);

for ($i = 0; $i < $length; $i++) {
$c[$a[$i]] =  $b[$i];
}
print_r($c);