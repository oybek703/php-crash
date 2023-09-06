<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';


$dateTime = new DateTime(
    '12.04.2021 14:34'
);

var_dump($dateTime);

$dateTime = new DateTime('12.04.2021', new DateTimeZone('Asia/Tashkent'));
echo "</br>";
echo "</br>";
var_dump($dateTime);