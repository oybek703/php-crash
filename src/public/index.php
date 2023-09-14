<?php
ob_start();
include 'file.php';
$r= ob_get_clean();
var_dump($r);
