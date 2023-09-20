<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use Cassandra\Date;

class Home
{
    public function index(): View
    {
        try {
            $db = new \PDO(
                'mysql:host=db;dbname=php_crash_db',
                'root',
                'root'
            );
            $email = 'sara1@gmail.com';
            $fullName = 'Sara Fly';
            $isActive = 1;
            $createdAt = date('Y-m-d H:i:s', (int)strtotime('08.07.2021 12:05PM'));
            $query = "insert into users(email, full_name, is_active, created_at)
                      values (:email, :fullName, :isActive, :createdAt)";
            $statement = $db->prepare($query);
            $statement->execute([
                'email' => $email,
                'fullName' => $fullName,
                'isActive' => $isActive,
                'createdAt' => $createdAt
            ]);
            $id = (int) $db->lastInsertId();
            $user = $db->query('SELECT * FROM users WHERE id=' . $id)->fetchAll();
            echo "<pre>";
            print_r($user);
            echo "</pre>";
        } catch (\PDOException $exception) {
            throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
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