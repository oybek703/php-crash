<?php

declare(strict_types=1);

use App\Invoice;

require_once __DIR__ . '/../vendor/autoload.php';

$inv1 = new Invoice(100, 'Test desc', '234567890');

$s1 = serialize($inv1);
//echo unserialize($s1);
?>

<pre>
    <?php
        echo unserialize($s1);
    ?>
</pre>

