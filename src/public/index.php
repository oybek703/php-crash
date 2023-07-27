<?php

declare(strict_types=1);


require_once __DIR__ . '/../vendor/autoload.php';

$classA = new \App\A();
$classB = new \App\B();

var_dump($classB::make());