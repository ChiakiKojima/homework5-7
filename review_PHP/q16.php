<?php
/*課題 16
二次元配列 $a = [[1,2,3], [4,5,6], [7,8,9]]を定義し、
tableタグを使ってこれらの値を表形式で表示してください。
期待される結果
+---+---+---+
| 1 | 2 | 3 |
+---+---+---+
| 4 | 5 | 6 |
+---+---+---+
| 7 | 8 | 9 |
+---+---+---+
*/


$a = [[1,2,3], [4,5,6], [7,8,9]];



$length = count($a);

/*for ($i = 0; $i < $length; $i++) {
    echo $a[i][i];
}*/
     
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>q16</title>
</head>
    <body>
        
    <table>
        <?php for ($i = 0; $i < $length; $i++): ?>
        <tr>
            <?php foreach ($a[$i] as $num): ?>
            <td><?php echo $num ?></td>
            <?php endforeach ?>
        </tr>
       <?php endfor ?>
    </table>
     
    </body>
</html>
