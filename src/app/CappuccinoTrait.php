<?php

namespace App;

trait CappuccinoTrait
{
    private function makeCappuccino(): void
    {
        echo static::class . ' is making cappuccino ' . PHP_EOL;
    }

    public function makeLatte(): void
    {
        echo static::class . ' is making latte (Cappuccino Trait)  ' . PHP_EOL;
    }
}