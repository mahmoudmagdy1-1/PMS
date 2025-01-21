<?php
require_once('../app/helpers/json_handler.php');

function get_last_id($path)
{
    $array = read_json($path);
    return empty($array) ? 0 : end($array)['id'];
}
