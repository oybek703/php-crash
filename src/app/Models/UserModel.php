<?php

namespace App\Models;

use App\Model;
use PDO;

class UserModel extends Model
{
    public function create(string $email, string $fullName, string $createdAt, bool $isActive = true): int
    {
        $query = "insert into users(email, full_name, is_active, created_at)
                      values (:email, :fullName, :isActive, :createdAt)";
        $statement = $this->db->prepare($query);
        $statement->execute([$email, $fullName, $isActive, $createdAt]);

        return (int)$this->db->lastInsertId();
    }
}