<?php
declare(strict_types=1);

use App\{ClassA, ClassB};

ini_set('display_errors', '1');
require '../vendor/autoload.php';

echo ClassA::getName();
echo "<br>";
echo ClassB::getName();