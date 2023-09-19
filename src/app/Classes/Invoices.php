<?php

namespace App\Classes;

class Invoices
{
    public function index(): void {
        echo "<h1>Invoices</h1>";
    }

    public function create(): void {
        echo <<<HTML
    <form action="/invoices/create" method="post">
        <label for="amount">
            Amount: <input name="amount" type="number">
        </label>
    </form>
 HTML;
    }

    public function store() {
        echo "<pre>";
            print_r($_POST);
        echo "</pre>";
    }

}