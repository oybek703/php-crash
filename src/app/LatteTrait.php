<?php

namespace App;

trait LatteTrait
{
    public static string $foo;
    public function makeLatte(): void
    {
        echo static::class . ' is making latte  ' . PHP_EOL;
    }
}