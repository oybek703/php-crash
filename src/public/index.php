<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$inv1 = new \App\Invoice(1, 'Desc 1');
$inv2 = new \App\Invoice(true, 'Desc 1');

var_dump($inv1 == $inv2);
var_dump($inv1 === $inv2);