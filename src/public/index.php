<?php
declare(strict_types=1);
ini_set('display_errors', '1');

require_once '../vendor/autoload.php';

$from = new DateTime();
$to = $from->add(new DateInterval('P1D'));


$date_format = 'm/d/y';

echo "<pre>";
    print_r($from->format($date_format) . ' - '  . $to->format($date_format));
echo "</pre>";
