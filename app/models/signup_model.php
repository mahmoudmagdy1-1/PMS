<?php
require_once("../app/helpers/json_handler.php");
require_once("../app/helpers/general.php");

function get_last_user()
{
    return get_last_id("../app/storage/JSON/users.json");
}

function insert_user($array)
{
    append_json("../app/storage/JSON/users.json", $array);
}
