<?php
declare(strict_types=1);
namespace App\Controllers;

use App\View;

class Invoices
{
    public function index(): View {
        return View::make('invoices/index', ['title' => 'Invoices']);
    }

    public function create(): View {
        return View::make('invoices/create', ['title' => 'Create new invoice']);
    }

    public function store() {
        echo "<pre>";
            print_r($_POST);
        echo "</pre>";
    }

}