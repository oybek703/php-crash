<?php
session_start();
if (isset($_POST['submit'])) {
    $username= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($username === 'John' && $password === '123456') {
        $_SESSION['username'] = $username;
        header('Location: /php-crash/dashboard.php');
    } else{
        echo  '<h4 style="color: red">Invalid credentials!</h4>';
    }
}

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="username">Username: </label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password">
    </div>
    <input type="submit" value="Submit" name="submit">
</form>
