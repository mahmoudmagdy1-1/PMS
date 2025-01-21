<?php
require_once("../app/helpers/json_handler.php");


function get_users()
{
    return read_json("../app/storage/JSON/users.json");
}
