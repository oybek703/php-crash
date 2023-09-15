<?php
declare(strict_types=1);

namespace App\Stripe;
class
Transaction
{
    public int $amount;
    public string $desc;

    public function __construct()
    {
    }

}