<?php

namespace App;

class Invoice
{
    public int $id;
    public function __construct(public int $amount)
    {
        $this->id = random_int(1, 10000);
    }

}