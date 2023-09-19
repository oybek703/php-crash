<?php

namespace App;

use App\Exception\MissingBilligInfoException;
use http\Exception\BadMethodCallException;

class Invoice
{
    public function __construct(protected Customer $customer)
    {
    }

    /**
     * @throws \Exception
     */
    public function process(int $amount)
    {
        if ($amount <= 0):
            throw new \InvalidArgumentException("Invalid amount: {$amount}");
        endif;
        echo $this->customer->getBillingInfo();
        if (empty($this->customer->getBillingInfo())):
            throw new MissingBilligInfoException('Missing billing information!');
        endif;
        echo "Processing {$amount}$ transaction - ";
        sleep(1);
        echo "OK";
    }
}