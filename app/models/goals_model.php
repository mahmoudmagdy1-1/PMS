<?php
require_once("../app/models/json_handler.php");

function get_all_goals()
{
    return readJson("../app/storage/JSON/goals.json");
}
