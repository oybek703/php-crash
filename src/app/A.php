<?php

namespace App;

class A
{
    protected static string $name = 'A';

    public static function getName(): string
    {
        var_dump(static::class);
        return static::$name;
    }

    static public function make(): static{
        return new static();
    }

}