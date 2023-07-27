<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$inv1 = new \App\Invoice();
$inv2 = new \App\Invoice();

$inv3 = \App\Invoice::create();


var_dump($inv1, $inv2, $inv3);