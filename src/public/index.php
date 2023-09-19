<?php
declare(strict_types=1);
ini_set('display_errors', '1');

require_once '../vendor/autoload.php';
use App\Invoice;


$invoice1 = new Invoice(
    uniqid('invoice_'),
    200,
    'My Invoice',
    '2345678908765'
);

//echo serialize($invoice1);
echo "<br>";
unserialize(serialize($invoice1));;