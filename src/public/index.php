<?php

declare(strict_types=1);


use App\Invoice;

require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new Invoice();
$invoice->amount = 10;

echo $invoice->amount;
var_dump($invoice);