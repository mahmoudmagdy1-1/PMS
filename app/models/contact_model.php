<?php
require_once("../app/helpers/json_handler.php");

function insert_contact($array)
{
    append_json("../app/storage/JSON/contacts.json", $array);
}
