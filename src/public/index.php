<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Fields\Boolean\Checkbox;
use App\Fields\Boolean\Radio;
use App\Fields\Text;

$fields = [
    new Text('name'),
    new Checkbox('verified'),
    new Radio('gender')
];

foreach ($fields as $field):
    echo $field->render() . '</br>';
endforeach;