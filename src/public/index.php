<?php
declare(strict_types=1);
ini_set('display_errors', (string)E_ALL);

require_once '../app/Stripe/Transaction.php';
require_once '../app/Paddle/Transaction.php';
require_once '../app/CustomerProfile.php';

use App\Stripe\Transaction;
use App\Paddle\Transaction as PaddleTransaction;


$tr1 = new Transaction();
$tr2 = new PaddleTransaction();

var_dump($tr1);
echo "<br>";
var_dump($tr2);

