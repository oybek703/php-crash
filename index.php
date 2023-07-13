<?php

function get_query_params(array $params_array): string
{
    $total = '';
    $params_count = count($params_array);
    if ($params_count == 0) return $total;
    if ($params_count == 1) $total .= '?' . key($params_array) . $params_array[key($params_array)];
    for ($i = 0; $i < $params_count; $i++) {
        $current_key = array_keys($params_array)[$i];
        $total .= ($i == 0 ? '?' : '&') . $current_key . '=' . $params_array[$current_key];
    }
    return $total;
}

$get_link = fn() => "<a href='{${get_query_params($_GET)}}'>Click</a>";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php echo $get_link() ?>
</body>
</html>
