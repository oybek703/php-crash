<?php

declare(strict_types=1);

use App\{Invoice, Customer};

require_once __DIR__ . '/../vendor/autoload.php';

$inv1 = new Invoice(new Customer('John'));

$inv1->process(-100);