<?php
require_once('../app/models/add_product_model.php');
require_once("../app/helpers/validation.php");


function add_product_index()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($_POST as $key => $value) {
            $$key = sanitize_input($value);
        }
        $id = get_last_product() + 1;
        $image = $_FILES['image'];
        $image_path = get_image_new_path($image);
        if ((!empty($price) && is_numeric($price)) && is_string($image_path) && !empty($name) && !empty($description)) {
            $data = array(
                "id" => $id,
                "name" => $name,
                "price" => $price,
                "image" => $image_path,
                "description" => $description,
                "sale_percentage" => $sale_percentage ?? 0,
            );
            insert_product($data);
            $_SESSION['status'] = 'Product added successfully.';
            $_SESSION['statusType'] = 'success';
        } else {
            $_SESSION['status'] = 'Could not add product. Please try again.';
            $_SESSION['statusType'] = 'danger';
        }
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    require('../app/views/layouts/header.php');
    require('../app/views/layouts/navbar.php');
    require('../app/views/admin/add_product.php');
    require('../app/views/layouts/footer.php');
}
