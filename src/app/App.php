<?php

namespace App;

use App\Exceptions\RouteNotFoundException;
use PDOException;

class
App
{
    public static  Db $db;

    public function __construct(
        protected Router $router,
        protected array $request,
        protected array $config
    )
    {
        try {
            static::$db = new Db($this->config);
        } catch (PDOException $exception) {
            throw new PDOException($exception->getMessage(), (int)$exception->getCode());
        }
    }

    public static function db(): Db {
        return static::$db;
    }

    public function run()
    {
        try {
            echo $this->router->resolve(
                $this->request['requestURI'],
                strtolower($this->request['requestMethod'])
            );
        } catch (RouteNotFoundException $e) {
            http_response_code(404);
            $errorMessage = $e->getMessage();
            echo View::make('404', ['errorMessage' => $errorMessage]);
        }
    }


}