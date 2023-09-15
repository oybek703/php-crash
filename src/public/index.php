<?php

function getValue() {
    static $value = null;
    if ($value == null) {
        $value = someFunction();
    }
    return $value;
}

function someFunction() {
    sleep(2);
    echo "Processing...";
    return 11;
}

echo getValue() . "<br>";
echo getValue() . "<br>";
echo getValue() . "<br>";