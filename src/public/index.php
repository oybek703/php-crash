<?php
declare(strict_types=1);
ini_set('display_errors', '1');

require_once '../vendor/autoload.php';
use App\Invoice;


$invoice1 = new Invoice(24, description:  'My Invoice');
echo "<br>";
$invoice2 = new $invoice1(25, 'asdas');
echo "<br>";

var_dump($invoice1);
echo "<br>";
var_dump($invoice2);
echo "<br>";
var_dump($invoice1 === $invoice2);
