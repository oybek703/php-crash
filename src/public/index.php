<?php

declare(strict_types=1);

use App\{Invoice, Customer};

require_once __DIR__ . '/../vendor/autoload.php';

$inv1 = new Invoice(new Customer(['foo' => 'bar']));

function process(): int | bool
{
    try {
        global $inv1;
        $inv1->process(-100);
        return true;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        return false;
    }
}


var_dump(process());