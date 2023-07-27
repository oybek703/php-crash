<?php

declare(strict_types=1);

namespace App;

class Invoice
{
    public function __construct(
        public Customer $customer
    ) {
    }

    public function process (float $amount): void
    {
        if ($amount <=0) {
            throw new \Exception('Invalid amount!');
        }
        echo 'Processing $'  . $amount . ' invoice - '  . PHP_EOL;
        sleep(1);
        echo "<strong style='font-family: sans-serif'>OK</strong>" . PHP_EOL;
    }

}