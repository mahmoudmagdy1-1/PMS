<?php
require_once("../app/models/checkout_model.php");
require_once("../app/helpers/validation.php");

if (!isset($_SESSION["user"]) || empty($_SESSION["cart"]["items"])) {
    header('Location: login');
    exit;
}

function checkout_index()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($_POST as $key => $value) {
            $$key = sanitize_input($value);
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($address) && !empty($phone)) {
            $data = array(
                "name" => $name,
                "email" => $email,
                "address" => $address,
                "phone" => $phone,
                "notes" => $notes,
                "cart" => $_SESSION['cart'],
            );
            insert_order($data);
            $_SESSION['status'] = 'Sent successfully. We will get back to you soon.';
            $_SESSION['statusType'] = 'success';
        } else {
            $_SESSION['status'] = 'Invalid input. Please try again.';
            $_SESSION['statusType'] = 'danger';
        }
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    require('../app/views/layouts/header.php');
    require('../app/views/layouts/navbar.php');
    require('../app/views/checkout/checkout.php');
    require('../app/views/layouts/footer.php');
}
