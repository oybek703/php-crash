<?php

declare(strict_types=1);

namespace App;

class
Invoice
{

    public function __toString(): string
    {
        echo ($this instanceof \Stringable);
        return '1';
    }

    public function __invoke()
    {
        echo "Invoked";
    }
}