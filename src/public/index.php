<?php
declare(strict_types=1);

use App\App;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Router;
use Dotenv\Dotenv;

require_once '../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
const STORAGE_PATH = __DIR__ . '/' . '../storage';
const VIEWS_PATH = __DIR__ . '/' . '../views';

$router = new Router();

$router
    ->get('/', [HomeController::class, 'index'])
    ->get('/download', [HomeController::class, 'download'])
    ->post('/upload', [HomeController::class, 'upload'])
    ->get('/invoices', [InvoiceController::class, 'index'])
    ->get('/invoices/create', [InvoiceController::class, 'create'])
    ->post('/invoices/create', [InvoiceController::class, 'store']);

(new App(
    $router,
    [
        'requestURI' =>$_SERVER['REQUEST_URI'],
        'requestMethod' => $_SERVER['REQUEST_METHOD']
    ],
    [
        'dbHost' => $_ENV['DB_HOST'],
        'dbName' => $_ENV['DB_NAME'],
        'dbUser' => $_ENV['DB_USER'],
        'dbPassword' => $_ENV['DB_PASSWORD'],
        'dbDriver' => $_ENV['DB_DRIVER'] ?? 'mysql'
    ])
)->run();