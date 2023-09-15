<?php
declare(strict_types=1);
ini_set('display_errors', (string)E_ALL);

spl_autoload_register(function ($class) {
    $dirname = dirname(__FILE__);
    $path = lcfirst(str_replace('\\', '/', $class));
    $full_path = "$dirname/../$path.php";
    require_once $full_path;
});

use App\Stripe\Transaction;
use App\Paddle\Transaction as PaddleTransaction;


$tr1 = new Transaction();
$tr2 = new PaddleTransaction();

var_dump($tr1);
echo "<br>";
var_dump($tr2);

