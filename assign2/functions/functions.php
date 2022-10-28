<?php

function sanitise_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function get_query_param($name, $default_value)
{
    return isset($_GET[$name]) ? $_GET[$name] : $default_value;
}
