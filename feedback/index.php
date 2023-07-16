<?php global $conn;
include 'inc/header.php' ?>

<?php
$name = $email = $body = '';
$nameErr = $emailErr = $bodyErr = '';

if (isset($_POST['submit'])) {
    if (!empty($_POST['name'])) {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    } else {
        $nameErr = 'Name is required';
    }
    if (!empty($_POST['email'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    } else {
        $emailErr = 'Email is required';
    }
    if (!empty($_POST['body'])) {
        $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    } else {
        $bodyErr = 'Feedback is required';
    }
    if (!$nameErr && !$emailErr && !$bodyErr) {
        $sql = "INSERT INTO feedback(name, email, body) VALUES('$name', '$email', '$body')";
        if (mysqli_query($conn, $sql)) {
            header('Location: feedback.php');
        } else {
            echo "Error:" . mysqli_error($conn);
        }
    }
}
?>

<img src="/php-crash/feedback/img/logo.png" class="w-25 mb-3" alt="">
<h2>Feedback</h2>
<p class="lead text-center">Leave feedback for Traversy Media</p>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="mt-4 w-75">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo !empty($nameErr) ? 'is-invalid' : '' ?>" id="name" name="name"
               placeholder="Enter your name">
        <div class="invalid-feedback">
            <?php echo $nameErr; ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo !empty($emailErr) ? 'is-invalid' : '' ?>" id="email"
               name="email" placeholder="Enter your email">
        <div class="invalid-feedback">
            <?php echo $emailErr; ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo !empty($bodyErr) ? 'is-invalid' : '' ?>" id="body" name="body"
                  placeholder="Enter your feedback"></textarea>
        <div class="invalid-feedback">
            <?php echo $bodyErr; ?>
        </div>
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
    </div>
</form>
<?php include 'inc/footer.php' ?>
