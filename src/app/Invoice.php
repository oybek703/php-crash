<?php

declare(strict_types=1);

namespace App;

class Invoice
{
    public function __construct(public mixed $amount, public string $desc)
    {
    }
}