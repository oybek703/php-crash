<?php
declare(strict_types=1);

use Dotenv\Dotenv;

require_once '../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
const STORAGE_PATH = __DIR__ . '/' . '../storage';
const VIEWS_PATH = __DIR__ . '/' . '../views';
//set_exception_handler(function (Throwable $exception) {
//    echo $exception->getMessage();
//});
session_start();
try {
    $router = new App\Router();

    $router
        ->get('/', [App\Controllers\Home::class, 'index'])
        ->get('/download', [App\Controllers\Home::class, 'download'])
        ->post('/upload', [App\Controllers\Home::class, 'upload'])
        ->get('/invoices', [App\Controllers\Invoices::class, 'index'])
        ->get('/invoices/create', [App\Controllers\Invoices::class, 'create'])
        ->post('/invoices/create', [App\Controllers\Invoices::class, 'store']);

    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

} catch (\App\Exceptions\RouteNotFoundException $e) {
//    header('HTTP/1.1 404 NoT Found');
    http_response_code(404);
    $errorMessage =  $e->getMessage();
    echo \App\View::make('404', ['errorMessage' => $errorMessage]);
}