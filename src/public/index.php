<?php

declare(strict_types=1);

use App\{Invoice, Customer};

require_once __DIR__ . '/../vendor/autoload.php';

$inv1 = new Invoice(new Customer(['foo' => 'bar']));

set_exception_handler(function (Exception $e) {
    var_dump($e->getMessage());
});

array_rand([], 1);
