<?php

$arr1 = ['name' => 'John', 'age' => 24];

echo "<pre>";
var_dump(array_key_exists('age', $arr1));
var_dump(isset($arr1['hobby']));
echo "</pre>";