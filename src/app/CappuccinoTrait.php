<?php

namespace App;

trait CappuccinoTrait
{
    public function makeCappuccino(): void
    {
        echo static::class . ' is making cappuccino ' . PHP_EOL;
    }

    public function makeLatte(): void
    {
        echo static::class . ' is making latte (Cappuccino Trait)  ' . PHP_EOL;
    }
}