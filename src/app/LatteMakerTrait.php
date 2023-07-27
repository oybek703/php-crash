<?php

namespace App;

trait LatteMakerTrait
{
    public function makeLatte(): void
    {
        echo static::class . ' is making latte  ' . PHP_EOL;
    }
}