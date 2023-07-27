<?php

declare(strict_types=1);

namespace App;

/**
 * @property-read int $x
 */
class Transaction
{

    /** @param Customer[] $arr */
    public function process(array $arr)
    {
        foreach ($arr as $obj) {
            var_dump($obj->name);
        }
    }
}