<?php
ini_set('display_errors', 1);

echo ini_get('max_execution_time');
set_time_limit(2);

sleep(3);

echo "<br> Hi there";