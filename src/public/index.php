<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$inv1 = new \App\Transaction(2, 'Desc 1');
$inv2 = new \App\Transaction(2, 'Desc 1');

$inv3 = $inv1;

var_dump($inv1 == $inv3);
var_dump($inv1 === $inv3);