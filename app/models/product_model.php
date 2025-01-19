<?php
require_once("../app/models/json_handler.php");

function get_all_products()
{
    return read_json("../app/storage/JSON/products.json");
}
