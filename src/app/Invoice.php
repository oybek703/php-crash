<?php

declare(strict_types=1);

namespace App;

class Invoice
{

    public function __construct()
    {
    }

    public static function create(): static
    {
        return new static();
    }
}