<?php

$str = 'Hi there';

$x= strpos($str, 'H');
echo $x;

$z = false;
echo $z ?? 'World';

echo $x === false ? 'H not found' : 'H found';