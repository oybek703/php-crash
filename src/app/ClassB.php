<?php

namespace App;

class ClassB extends ClassA
{
    protected static string $name ='B';


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