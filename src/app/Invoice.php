<?php

namespace App;

class
Invoice
{
    public function __get(string $name)
    {
        var_dump($name);
    }

    public function __set(string $name, $value): void
    {
        if ($name === 'amount') {
            throw new \Exception('This is not allowed!');
        }
        $this->$name = $value;
    }

}