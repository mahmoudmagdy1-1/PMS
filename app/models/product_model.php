<?php
require_once("../app/models/json_handler.php");

function get_all_products()
{
    return readJson("../app/storage/JSON/products.json");
}
