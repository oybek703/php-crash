<?php

declare(strict_types=1);

namespace App;

class Transaction
{
    public function process(array $arr) {
        /** @var  Customer $obj */
        foreach ($arr as $obj) {
            var_dump($obj->name);
        }
    }
}