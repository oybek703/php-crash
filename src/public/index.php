<?php

$x =10;

$sum = function (int $y) use(&$x): int {
    $x = 11;
    return $x + $y;
};
echo $sum(10);
echo "<br>";
echo $x;
