<?php

namespace App\Classes;

class Home
{
    public function index(): void {
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
        var_dump($_SESSION);
        echo "<h1>Home</h1>";
    }
}