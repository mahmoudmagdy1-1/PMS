<?php
require_once("../app/models/json_handler.php");

function get_all_goals()
{
    return read_json("../app/storage/JSON/goals.json");
}
