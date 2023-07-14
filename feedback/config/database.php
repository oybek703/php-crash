<?php
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'yoriqulov');
define('DB_PASS', '123456');
define('DB_NAME', 'php-crash');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed {$conn->connect_error}");
}

echo 'Connected successfully!';


