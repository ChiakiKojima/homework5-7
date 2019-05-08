<?php

/*空の配列 $a = array(); を定義し、
この配列に任意の値を 3 つ追加して
各要素の値を画面に表示*/

$a = array();

$a[0] = 1;
$a[1] = 'One';
$a[2] = 'いち';

foreach ($a as $num) {
    echo $num.'<br>';
}