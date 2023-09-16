<?php
declare(strict_types=1);
ini_set('display_errors', '1');
require '../vendor/autoload.php';

use App\Stripe\Transaction;

$transaction = new Transaction(25);

$reflectionProperty = new ReflectionProperty(Transaction::class, 'amount');

$reflectionProperty->setAccessible(true);

$reflectionProperty->setValue($transaction, 125);

var_dump($reflectionProperty->getValue($transaction));

$transaction->process();