<?php
/*連想配列 $a = ['apple' => 400, 'banana' => 150, 'cherry' => 500] のキー 'cherry' の値に 300 に変更して、
print_r で画面に表示してください。
期待される結果
Array ( [apple] => 400 [banana] => 150 [cherry] => 300 )*/

$a = ['apple' => 400, 'banana' => 150, 'cherry' => 500];
$a[cherry] = 300;

print_r($a);

?>