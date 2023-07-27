<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

class Transaction
{
    private static float $count = 0;

    public function __construct(private float $amount, public string $description)
    {
        self::$count++;
    }

    public function copyFrom(Transaction $transaction): void
    {
        var_dump($transaction->amount, $transaction::$count);
    }

    /**
     * @return float
     */
    public static function getCount(): float
    {
        return self::$count;
    }

    public function process(): void
    {
        echo "Processing paddle transaction...";
    }

}