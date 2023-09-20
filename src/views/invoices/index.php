<?php

ob_start();
$body = <<<HTML
<h1>InvoiceController</h1>
HTML;
include_once '../views/layout.php';
$layout = ob_get_clean();
$layout = str_replace("{{body}}", $body, $layout);
$layout = str_replace("{{title}}", $title ?? 'Document', $layout);
echo $layout;