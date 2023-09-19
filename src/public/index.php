<?php
declare(strict_types=1);
ini_set('display_errors', '1');

require_once '../vendor/autoload.php';

$invoices = new \App\InvoiceCollection([
    new \App\Invoice(10),
    new \App\Invoice(20),
    new \App\Invoice(30),
//    new \App\Invoice(40),
//    new \App\Invoice(50)
]);

//$invoice
foreach ($invoices as $invoice):
    echo "<pre>";
        echo $invoice->id . ' - ' . $invoice->amount  . '<br>';
    echo "</pre>";

endforeach;