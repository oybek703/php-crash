<?php
if (isset($_POST['submit'])) {
    if (!empty($_FILES['upload']['name'])) {
        print_r($_FILES);
        $file_name = $_FILES['upload']['name'];
    } else {
        echo "<h3 style='color: red'>Plase choose file!</h3>";
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
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    Select file to upload:
    <br>
    <input type="file" name="upload">
    <br>
    <input name="submit" type="submit" value="Submit">
</form>
</body>
</html>