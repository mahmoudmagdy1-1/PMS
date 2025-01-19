<?php
require_once("../app/models/json_handler.php");

function insert_contact($array)
{
    write_json("../app/storage/JSON/contacts.json", $array);
}
