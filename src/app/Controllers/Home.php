<?php
declare(strict_types=1);
namespace App\Controllers;

use App\View;

class Home
{
    public function index(): View {
        return  View::make('index', ['title' => 'Homepage']);
    }

    public function upload() {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);
        echo "<pre>";
            var_dump($filePath);
        echo "</pre>";
    }
}