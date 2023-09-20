<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Models\UserModel;
use App\View;
use PDO;
use PDOException;

class HomeController
{
    public function index(): View
    {
        $db = App::db();
        $email = uniqid();
        $fullName = 'Sara Fly';
        $createdAt = date('Y-m-d H:i:s', (int)strtotime('08.07.2021 12:05PM'));
        try {
            $db->beginTransaction();
            $userModel = new UserModel();
            $userId = $userModel->create($email, $fullName, $createdAt);
            $user = $db->query('SELECT * FROM users WHERE id=' . $userId)->fetchAll();
            echo "<pre>";
            print_r($user);
            echo "</pre>";
            $db->commit();
        } catch (PDOException $exception) {
            if($db->inTransaction()) {
                $db->rollBack();
            }
            throw $exception;
        }
        return View::make('index', ['title' => 'Homepage']);
    }

    public function download(): void
    {
        header('Content-Type: application/pdf');
        $newFilename = uniqid("file_") . '.pdf';
        header("Content-Disposition: attachment;filename=\"{$newFilename}\"");
        readfile(STORAGE_PATH . '/some_document.pdf');
    }

    public function upload()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);
        header('Location: /');
        exit();
    }
}