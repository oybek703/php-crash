<?php

ob_start();
$body = <<<HTML
    <h2 style="color: gray">$errorMessage</h2>
HTML;
include_once '../views/layout.php';
$layout = ob_get_clean();
$layout = str_replace("{{body}}", $body, $layout);
$layout = str_replace("{{title}}", $title ?? 'Document', $layout);
echo $layout;
