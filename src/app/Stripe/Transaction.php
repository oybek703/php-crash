<?php

declare(strict_types=1);

namespace App\Stripe;

class
Transaction
{

    public function __construct(private int $amount)
    {
    }


    public function process() {
        echo "Processing {$this->amount}$ transaction.";
    }
}