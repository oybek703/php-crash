<?php
ini_set('display_errors', '1');

$texts =['hello', 'world'];
$stream = fopen('foo.txt', 'r+');


foreach ($texts as $index=> $text):
    if ($index === 0):
        file_put_contents('foo.txt', $text);
    else:
        file_put_contents('foo.txt', "\n{$text}", FILE_APPEND);
    endif;
endforeach;


fclose($stream);

