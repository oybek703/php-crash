<?php

namespace App;

use App\Exceptions\RouteNotFoundException;

class
App
{

    public function __construct(protected Router $router, protected array $request)
    {
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