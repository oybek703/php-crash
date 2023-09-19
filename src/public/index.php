<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/' . '../storage');

session_start();

$router = new App\Router();

$router
    ->get('/', [App\Classes\Home::class, 'index'])
    ->post('/upload', [App\Classes\Home::class, 'upload'])
    ->get('/invoices', [App\Classes\Invoices::class, 'index'])
    ->get('/invoices/create', [App\Classes\Invoices::class, 'create'])
    ->post('/invoices/create', [App\Classes\Invoices::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
