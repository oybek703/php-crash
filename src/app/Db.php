<?php

namespace App;

use PDO;

/**
 * @mixin PDO
 */
class Db
{
    private PDO $pdo;
    public function __construct(protected array $config)
    {
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $this->pdo = new PDO(
            "{$this->config['dbDriver']}:host={$this->config['dbHost']};dbname={$this->config['dbName']}",
            $this->config['dbUser'],
            $this->config['dbPassword']
        , $this->config['options'] ?? $defaultOptions);
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->pdo, $name], $arguments);
    }
}