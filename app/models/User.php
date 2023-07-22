<?php

class User
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Find user by email
    public function checkIfEmailExists($email): bool
    {
        $query = 'SELECT * FROM users WHERE EMAIL=:email';
        $this->db->query($query);

        // Bind value
        $this->db->bind(':email', $email);

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data): bool
    {
        $query = 'INSERT INTO users(name, email, password) VALUES (:name, :email, :password)';
        $this->db->query($query);
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login user
    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email=:email');
        $this->db->bind(':email', $email);

        $user = $this->db->singleSet();
        $hashed_user_password = $user->password;
        if (password_verify($password, $hashed_user_password)) {
            return $user;
        } else {
            return  false;
        }
    }

    public function getUserById($user_id) {
        $this->db->query('SELECT * FROM users WHERE id=:id');
        // Bind user id
        $this->db->bind(':id', $user_id);
        return $this->db->singleSet();
    }

}

?>

