<?php

declare(strict_types=1);

namespace App;

class Customer
{
    public function __construct(
        public ?array $info
    ) {
    }

    public function getBillingInfo(): ?array
    {
        if (empty($this->info)) return null;

        return $this->info;
    }

}