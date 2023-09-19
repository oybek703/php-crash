<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

const STORAGE_PATH = __DIR__ . '/' . '../storage';
const VIEWS_PATH = __DIR__ . '/' . '../views';

session_start();

$router = new App\Router();

$router
    ->get('/', [App\Controllers\Home::class, 'index'])
    ->post('/upload', [App\Controllers\Home::class, 'upload'])
    ->get('/invoices', [App\Controllers\Invoices::class, 'index'])
    ->get('/invoices/create', [App\Controllers\Invoices::class, 'create'])
    ->post('/invoices/create', [App\Controllers\Invoices::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
