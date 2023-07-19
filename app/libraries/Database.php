<?php

/*
PDO Database Class
Connect to database
Create prepared statements
Bind values
Return rows and results
 */

class Database
{
    private string $db_host = DB_HOST;
    private string $db_user = DB_USER;
    private string $db_password = DB_PASS;
    private string $db_name = DB_NAME;
    private PDO $db_handler;
    private PDOStatement $statement;
    private string $error;

    public function __construct()
    {
        // Set DSN
        $dsn = "mysql:host={$this->db_host};dbname={$this->db_name}";
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            $this->db_handler = new PDO($dsn, $this->db_user, $this->db_password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare statement with query
    public function query($sql): void
    {
        $this->statement = $this->db_handler->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null): void
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    // Execute prepared statement
    public function execute(): bool
    {
        return $this->statement->execute();
    }

    // Get result set as an array of objects
    public function resultSet(): false|array
    {
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    // Get set as an object
    public function singleSet(): false|array
    {
        $this->statement->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }


    // Get row count
    public function rowCount(): int
    {
        return $this->statement->rowCount();
    }
}

?>