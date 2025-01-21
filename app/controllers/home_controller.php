<?php
require_once("../app/models/home_product_model.php");
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = ['user_id' => 0, 'items' => [], 'total' => 0];



function home_index()
{
    $products = get_all_products();

    require('../app/views/layouts/header.php');
    require('../app/views/layouts/navbar.php');
    require('../app/views/home/home.php');
    require('../app/views/layouts/footer.php');
}
