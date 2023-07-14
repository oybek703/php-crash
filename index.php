<?php
function inverse(string $x): float|int
{
    if (!$x) {
        throw new Exception('Division to zero!');
    }
    return 1 / $x;
}

try {
    echo inverse(5);
    echo  '</br>';
    echo inverse(0);
} catch (Exception $e) {}
    echo 'Something went wrong!';
    echo  '</br>';
    echo $e->getMessage();
?>