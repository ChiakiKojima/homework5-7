<?php
/*課題 19
連想配列 $a = ['fruits' => ['apple' => 400, 'banana' => 150, 'cherry' => 500], 'vegetables' => ['onion' => 120,
'carrot' => 240, 'potato' => 360]] を定義し、
キー 'fruits' の連想配列の各要素の値に 100 を追加し、print_r で
$a を画面に表示してください。
期待される結果
Array ( [fruits] => Array ( [apple] => 500 [banana] => 250 [cherry] => 600
) [vegetables] => Array ( [onion] => 120 [carrot] => 240 [potato] => 360 )
)*/

 $a = ['fruits' => ['apple' => 400, 'banana' => 150, 'cherry' => 500], 'vegetables' => ['onion' => 120,
'carrot' => 240, 'potato' => 360]];


/*echo $a[fruits][apple]; //結果: 400 */

foreach ($a[fruits] as $fruit => $price) {
    $a[fruits][$fruit] += 100;
}

print_r($a);