<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$inv1 = new \App\Invoice();
$inv2 =  clone $inv1;


var_dump($inv1, $inv2, $inv1 === $inv2);