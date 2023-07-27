<?php

declare(strict_types=1);

namespace App;

class Invoice
{
    private static $id;

    public function __construct()
    {
        $this->id = uniqid('invoice_');
    }

    public function __clone(): void
    {
        $this->id = uniqid('invoice_');
    }

    public static function create(): static
    {
        return new static();
    }
}