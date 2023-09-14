<?php

function temp() {
    sleep(3);
    echo "Done <br>";
    return 2;
}

// Execution time takes 9 seconds overall
//$t = temp();
//
//if ($t === 1) {
//
//} elseif ($t === 4 ) {
//
//} elseif ($t === 3) {
//
//}

switch (temp()):
    case 3:
        echo temp();
        break;
    case 4:
        echo temp();
        break;
    case 5:
        echo temp();
        break;
    default:
        echo null;
endswitch;