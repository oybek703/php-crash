<?php
declare(strict_types=1);
namespace App\Controllers;

use App\View;

class Home
{
    public function index(): View {
        return  View::make('index', ['title' => 'Homepage']);
    }

    public function download(): void {
        header('Content-Type: application/pdf');
        $newFilename = uniqid("file_") . '.pdf';
        header("Content-Disposition: attachment;filename=\"{$newFilename}\"");
        readfile(STORAGE_PATH . '/some_document.pdf');
    }

    public function upload() {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);
        header('Location: /');
        exit();
    }
}