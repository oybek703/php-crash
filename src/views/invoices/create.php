<?php

ob_start();
$body = <<<HTML
<form action="/invoices/create" method="post">
    <label for="amount">
        <h4 style="display: inline">Amount</h4>: <input name="amount" type="number">
    </label>
</form>
HTML;
include_once '../views/layout.php';
$layout = ob_get_clean();
$layout = str_replace("{{body}}", $body, $layout);
$layout = str_replace("{{title}}", $title ?? 'Document', $layout);
echo $layout;