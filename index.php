<?php
$posts = ['First Post', 'Second Post', 'Third Post'];

//for ($x = 0; $x < count($posts); $x++) {
//    echo "$x - $posts[$x] </br>";
//}

foreach ($posts as $key => $value) {
    echo "$key. $value </br>";
}