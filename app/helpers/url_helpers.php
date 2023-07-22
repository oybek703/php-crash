<?php
function redirect($page): void
{
    header('Location: ' . URL_ROOT . $page);
}