<?php
require_once("../app/helpers/json_handler.php");

function get_all_products()
{
    return read_json("../app/storage/JSON/products.json");
}

function get_product_by_id($product_id)
{
    $products = read_json("../app/storage/JSON/products.json");
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            return $product; // Return the matching product
        }
    }
    return null;
}
