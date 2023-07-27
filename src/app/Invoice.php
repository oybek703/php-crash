<?php

declare(strict_types=1);

namespace App;

class
Invoice
{

    protected function process(float $amount, string $description): void
    {
        echo $amount . $description;
    }

    public function __call(string $name, array $arguments)
    {
        if (method_exists($this, $name)) {
            call_user_func_array([$this, $name], $arguments);
//            $this->$name(...$arguments);
        }
    }

}