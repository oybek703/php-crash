<?php
session_start();

// Flash message helper
// EXAMPLE - flash('register_success', 'You are now registered!')
// DISPLAY ON VIEW - echo flash('register_success')
function flash($name, $message = '', $class = 'alert alert-success')
{
    if (!empty($name)) {
        $class_name = "{$name}_class";
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$class_name])) {
                unset($_SESSION[$class_name]);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$class_name] = $class;
        } elseif (empty($message) && !empty($_SESSION[$class_name])) {
            $class = !empty($_SESSION[$class_name]) ? $_SESSION[$class_name] : '';
            echo "<div class='$class' id='msg-flash'>$_SESSION[$name]</div>";
            unset($_SESSION[$name]);
            unset($_SESSION[$class_name]);
        }
    }
}


function isUserLoggedIn(): bool
{
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}