<?php

namespace App;

/**
 * @property-read ?array db
 */
class Config
{

    protected array $config = [];
    public function __construct(array $env)
    {
        $this->config = [
            'db'=> [
                'dbHost' => $env['DB_HOST'],
                'dbName' => $env['DB_NAME'],
                'dbUser' => $env['DB_USER'],
                'dbPassword' => $env['DB_PASSWORD'],
                'dbDriver' => $env['DB_DRIVER'] ?? 'mysql'
            ]
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}