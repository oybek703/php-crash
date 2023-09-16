<?php
declare(strict_types=1);
ini_set('display_errors', '1');
require '../vendor/autoload.php';

use App\Stripe\Transaction;

$transaction = new Transaction(25);

$transaction->copyFrom(new Transaction(100));
$transaction->process();