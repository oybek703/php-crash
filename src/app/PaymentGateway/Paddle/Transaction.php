<?php

namespace App\PaymentGateway\Paddle;

class Transaction
{
    private static float $count = 0;

    public function __construct(public float $amount, public string $description)
    {
        self::$count++;
    }

    /**
     * @return float
     */
    public static function getCount(): float
    {
        return self::$count;
    }

    public function process(): void {
        array_map(static function () {
            var_dump($this->amount);
        }, [1]);

        echo "Processing paddle transaction...";
    }

}