<?php
require_once("../app/models/json_handler.php");

function get_last_id()
{
    $users = read_json("../app/storage/JSON/users.json");
    return empty($users) ? 0 : end($users)['id'];
}

function insert_user($array)
{
    write_json("../app/storage/JSON/users.json", $array);
}
