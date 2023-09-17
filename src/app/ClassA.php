<?php

namespace App;

class ClassA
{
    protected static string $name ='A';


    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::$name;
    }

    public static function process(): static {
        return new static();
    }

}