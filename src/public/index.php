<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction(100, 'Test desc');

echo $transaction::getCount();

