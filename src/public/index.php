<?php

$nums = [1, 2, 3];

$obj = (object)$nums;

$obj1 = (object) 'hi there';

var_dump($obj1->scalar);

var_dump($obj->{2});