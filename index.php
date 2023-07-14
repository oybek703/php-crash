<?php
if (isset($_POST['submit'])) {
    if (!empty($_FILES['upload']['name'])) {
        $allowed_file_types = array('png', 'jpg', 'jpeg', 'gif');
        $file_name = $_FILES['upload']['name'];
        $file_size = $_FILES['upload']['size'];
        $file_type = explode('.', $_FILES['upload']['name']);
        $file_type = end($file_type);
        $file_type = strtolower($file_type);
        $file_temp = $_FILES['upload']['tmp_name'];
        echo $file_temp;
        $target_dir = "uploads/$file_name";
        if (in_array($file_type, $allowed_file_types)) {
            if ($file_size < 1000000) {
                move_uploaded_file($file_temp, $target_dir);
                $message = "<h3 style='color: green'>File uploaded successfully!</h3>";
            } else {
                $message = "<h3 style='color: red'>File size is too big!</h3>";
            }
        } else {
            $message = "<h3 style='color: red'>Invalid file type!</h3>";
        }
    } else {
        $message = "<h3 style='color: red'>Please choose file!</h3>";
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php echo $message ?? null ?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    Select file to upload:
    <br>
    <input type="file" name="upload">
    <br>
    <input name="submit" type="submit" value="Submit">
</form>
</body>
</html>