<?php

use App\PaymentGateway\Paddle\Transaction;

//$paddleTransaction = new Transaction();

//var_dump($paddleTransaction);

require_once __DIR__ . '/../vendor/autoload.php';

$id = new \Ramsey\Uuid\UuidFactory();

echo $id->uuid4();