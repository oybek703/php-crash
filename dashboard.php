<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "<h1 style='color: green'>Welcome {$_SESSION['username']} </h1>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "<h1 style='color: green'>Welcome Guest! </h1>";
    echo "<a href='index.php'>Login</a>";
}