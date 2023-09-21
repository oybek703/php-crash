<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;

class Router
{
    public array $routes = [];

    public function __construct()
    {
    }



    public function register(string $requestMethod, string $route, callable|array $action): void
    {
        $this->routes[$requestMethod][$route] = $action;
    }

    /**
     * @throws RouteNotFoundException
     */
    public function resolve(string $requestURI, string $requestMethod)
    {
        $route = explode('?', $requestURI)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;
        if (!$action) {
            throw new RouteNotFoundException();
        }
        if (is_callable($action)) {
            return call_user_func($action);
        }
        if (is_array($action)){
            [$class, $method] = $action;
            if(class_exists($class)) {
                $class = new $class();
                if (method_exists($class, $method)){
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
        throw new RouteNotFoundException();
    }

    public function get(string $route, callable|array $action): self
    {
        $this->register('get', $route, $action);
        return $this;
    }

    public function post(string $route, callable|array $action)
    {
        $this->register('post', $route, $action);
        return $this;
    }


}