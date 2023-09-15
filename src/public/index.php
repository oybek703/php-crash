<?php
declare(strict_types=1);

use App\Stripe\Transaction;
use Ramsey\Uuid\Uuid;

ini_set('display_errors', (string)E_ALL);

require '../vendor/autoload.php';

$uid1 = Uuid::uuid4();
$tr1 = new Transaction();


echo $uid1;
var_dump($tr1);