<?php
declare(strict_types=1);
ini_set('display_errors', '1');
require '../vendor/autoload.php';

use App\{Field, Boolean, Text, Radio, Checkbox};

$fields = [
    new Text('booleanField'),
    new Radio('booleanField'),
    new Checkbox('booleanField')
];

foreach ($fields as $field):
    echo $field->render() . '<br>';
endforeach;