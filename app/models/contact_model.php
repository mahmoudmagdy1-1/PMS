<?php
require_once("../app/models/json_handler.php");

function insert_contact($array)
{
    writeJson("../app/storage/JSON/contacts.json", $array);
}
