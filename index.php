<?php
setcookie('name', 'John', time() + 86400);

if (isset($_COOKIE['name'])) {
    echo $_COOKIE['name'];
}

setcookie('name', '' ,time() - 86400);