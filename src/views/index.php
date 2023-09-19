<?php

ob_start();
$body = <<<HTML
<form action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="receipt">
    <button type="submit">Upload</button>
</form>
HTML;
include_once '../views/layout.php';
$layout = ob_get_clean();
$layout = str_replace("{{body}}", $body, $layout);
$layout = str_replace("{{title}}", $title ?? 'Document', $layout);
echo $layout;
