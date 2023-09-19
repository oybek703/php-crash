<?php

namespace App;

class View
{
    public function __construct(protected string $route, protected array $params = [])
    {

    }

    public function render() {
        ob_start();
        foreach ($this->params as $key => $value) {
            $$key = $value;
        }
        include VIEWS_PATH . '/' . $this->route . '.php';
        return ob_get_clean();
    }

    public static function make(string $route, ?array $params = []): self {
        return new static($route, $params);
    }

    public function __toString(): string
    {
        return $this->render();
    }

}