<?php
$i=0;

while ($i < 10):
    if ($i === 3):
        $i++;
        continue;
    endif;
    echo "<h4>i: {$i}</h4>";
    $i++;
endwhile;