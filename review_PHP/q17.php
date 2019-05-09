<?php
/*課題 17
値として配列が設定された連想配列 
$a = ['apple' => [1,2,3], 'banana' => [4,5,6], 'cherry' => [7,8,9]] を定義
し、キー cherry の値の全要素を合計した結果を画面に表示してください。
期待される結果
24*/

$a = ['apple' => [1,2,3], 'banana' => [4,5,6], 'cherry' => [7,8,9]];

/*print_r($a[cherry]);
echo $a[cherry][0];*/



$sum = 0;
foreach ($a[cherry] as $num) {
    $sum += $num;
}
echo $sum;

/*$length = count($a[cherry]);
echo $length;
for ($i=0; $i < $length; $i++) {
    $sum += $a[cherry][$i];
}
echo $sum;*/

