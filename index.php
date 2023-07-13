<?php
$filename = 'users2.txt';

if (file_exists($filename)) {
    $handle = fopen($filename, 'r');
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    echo $contents;
} else {
    $handle = fopen($filename, 'w');
    $contents = "Brad \nTime \nJane \nJohn";
    fwrite($handle, $contents);
    fclose($handle);
}

?>