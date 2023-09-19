<?php

namespace App;

/**
 * @property int $amount
 * @property string $description
 */
class Invoice
{

    private string $id;
    /**
     * @param int $amount
     * @param string $description
     */
    public function __construct(int $amount, string $description)
    {
        $this->id= uniqid('invoice_');
        echo "__construct";
    }

    public function __clone(): void
    {
        $this->id = uniqid('invoice_');
        echo "__clone";
    }
}