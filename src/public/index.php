<?php
declare(strict_types=1);
$nums = [];

for ($i = 1; $i < 10; $i++) {
    $nums["i_{$i}"] = $i;
}


$even = array_filter($nums, fn($n, $key) => $n % 2 === 0, ARRAY_FILTER_USE_BOTH);

$r = array_map(fn($n) => $n * 100, $nums);

echo "<pre>";
print_r($r);
echo "<pre>";