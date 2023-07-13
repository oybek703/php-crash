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

if (isset($_POST['submit'])) {
    echo filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    echo filter_input(INPUT_POST, 'age', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

echo $get_link();

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="age">Age: </label>
        <input type="number" name="age">
    </div>
    <input type="submit" name="submit" value="Submit">
</form>

