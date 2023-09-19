<?php
declare(strict_types=1);
ini_set('display_errors', '1');

require_once '../vendor/autoload.php';
use App\Invoice;

set_exception_handler(function (Throwable $e) {
    echo $e->getMessage() . ' ' . $e->getFile() .  ': ' . $e->getLine();
});


$invoice1 = new Invoice(new \App\Customer());

echo array_rand([], 1);

//try {
//    $invoice1->process(2000) . PHP_EOL;
//} catch (Throwable $exception) {
//    echo $exception->getMessage() . PHP_EOL;
//}

