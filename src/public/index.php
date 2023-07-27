<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$obj = new class {
    public function __construct()
    {
    }
};

var_dump(get_class($obj));