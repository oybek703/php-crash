<?php

$time1 = date('F s');
echo $time1;

if ($time1) {
    echo "Time is {$time1}";
} elseif ($time1 === 12) {
    echo 'Time is 12';
} else {
    echo 'Time is not detected';
}

$color = 'blue';

switch ($color) {
    case 'blue':
        echo 'Blue selected';
        break;
    case  'red':
        echo 'Red selected';
        break;
    case  'green':
        echo 'Green selected';
        break;
    default:
        echo 'Red, Green, Blue is not selected';
}

?>
