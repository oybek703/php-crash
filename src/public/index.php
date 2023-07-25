<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Enums\Status;
use App\PaymentGateway\Paddle\Transaction;

$paddleTransaction = new Transaction();

$paddleTransaction->setStatus(Status::PAID);
echo $paddleTransaction->status;
