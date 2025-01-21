<?php
require_once("../app/helpers/json_handler.php");


function insert_order($array)
{
    append_json("../app/storage/JSON/orders.json", $array);
}
