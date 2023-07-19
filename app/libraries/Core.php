<?php
/*
    App Core class
    Creates URL and loads controllers
    URL FORMAT - /controllers/method/params
 */

class Core
{
    protected object | string $currentController = 'Pages';
    protected string $currentMethod = 'index';
    protected array $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        $new_current_controller = ucwords($url[0]);
        $filename = "../app/controllers/{$new_current_controller}.php";

        // Look in controllers for first value
        if (file_exists($filename)) {
            // If exists, set as controllers
            $this->currentController = $new_current_controller;
            // Unset 0 Index
            unset($url[0]);
        }

        $filename = "../app/controllers/{$this->currentController}.php";

        // Require the controllers
        require_once $filename;

        // Instantiate controllers class
        $this->currentController = new $this->currentController();

        // Check for the second part of url
        $new_method = $url[1];

        if (isset($new_method)) {
            // Check if new_method exists in controller
            if (method_exists($this->currentController, $new_method)) {
                $this->currentMethod = $new_method;
                // Unset 1 Index
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with an array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
    }

}
