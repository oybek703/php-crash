<?php
$numbers = [1, 2, 3];
$fruits = array('apple', 'banana', 'kiwi');

// Associative array
$person = [
    'first_name' => 'John',
    'last_name' => 'Doe',
    'age' => 24,
    'hobby' => 'sport'
];

//echo "<h1 style='color: red'>$person[first_name] $person[last_name]</h1> is $person[age] years old and his hobby is $person[hobby]."

// Multidimensional arrays
$people = [
    ['name' => 'Jane', 'age' => 34]
];

echo $people[0]['name'];
var_dump(json_encode($people));

?>
