<?php
require_once("../app/models/product_model.php");



function home_index()
{
    $products = get_all_products();

    require('../app/views/layouts/header.php');
    require('../app/views/layouts/navbar.php');
    require('../app/views/home/home.php');
    require('../app/views/layouts/footer.php');
}
