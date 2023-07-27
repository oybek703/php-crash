<?php

declare(strict_types=1);

namespace App;

class DB
{
    private static ?DB $instance = null;

    private function __construct(array $config)
    {
        echo "Instance created! </br>";
    }

    public static function getInstance(array $config): DB
    {
        if (self::$instance === null) {
            self::$instance = new DB($config);
        }
        return self::$instance;
    }


}