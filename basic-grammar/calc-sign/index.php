<?php
echo '<h4>算术运算符</h4>';
// 算术运算符
$x = 8;
$y = 2;
$z = 3;

echo 'x + y =>' . ($x + $y) . '<br/>';
echo 'x - y =>' . ($x - $y) . '<br/>';
echo 'x * y =>' . ($x * $y) . '<br/>';
echo 'x / y =>' . ($x / $y) . '<br/>';
echo 'x % z =>' . ($x % $z) . '<br/>';
echo 'x % z =>' . ($x % $z) . '<br/>';
echo '-$x =>' . (-$x) . '<br/>';
echo 'intdiv(x, y) =>' . (intdiv($x, $z)) . '<br/>';
echo '<h4>赋值运算符</h4>';
// 赋值运算符
$x = 10;
echo $x . '<br/>'; // 输出10

$y = 20;
$y += 100;
echo $y . '<br/>'; // 输出120

$z = 50;
$z -= 25;
echo $z . '<br/>'; // 输出25

$i = 5;
$i *= 6;
echo $i . '<br/>'; // 输出30

$j = 10;
$j /= 5;
echo $j . '<br/>'; // 输出2

$k = 15;
$k %= 4;
echo $k . '<br/>'; // 输出3

$l = 'hello';
$l .= ' world';
echo $l . '<br/>';

echo '<h4>递增/递减运算符</h4>';
// 递增/递减运算符
$x = 10;
echo ++$x . "<br/>";
$y = 10;
echo $y++ . "<br/>";
$z = 5;
echo --$z . "<br/>";
$i = 5;
echo $i-- . "<br/>";

echo '<h4>比较运算符</h4>';
echo var_dump(5 == '5') . "<br/>";
echo var_dump(5 === '5') . "<br/>";
echo (10 <=> '10') . "<br/>";
echo (10 <=> '100') . "<br/>";
echo (10 <=> '9') . "<br/>";
