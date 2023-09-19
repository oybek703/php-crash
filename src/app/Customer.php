<?php

namespace App;

class Customer
{
    public function __construct(private ?array $billingInfo = [])
    {
    }

    public function getBillingInfo(): ?array
    {
        return empty($this->billingInfo) ? null : $this->billingInfo;
    }
}