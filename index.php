<?php
function sum($n1, $n2) {
    return $n1+ $n2;
}

$sum1 = sum(1,2);
echo $sum1 . '</br>';

$y=1;

$f2 = fn ($n1, $n2) => $n1 + $n2 ;

echo $f2(20, 87);