<?php
require_once('../app/models/cart_model.php');
require_once('../app/models/home_product_model.php');
require_once('../app/helpers/json_handler.php');

$user_id = $_SESSION['user']['id'] ?? 0;

function cart_index()
{
    global $user_id;
    $user_cart = $_SESSION['cart'];
    require_once('../app/views/layouts/header.php');
    require_once('../app/views/layouts/navbar.php');
    require_once('../app/views/cart/cart.php');
    require_once('../app/views/layouts/footer.php');
}

function cart_add()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $user_id;
        $data = json_decode(file_get_contents('php://input'), true);
        add_to_cart($user_id, $data['product_id'], $data['quantity']);
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'count' => items_count()
        ]);
        exit;
    }
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}


function cart_remove()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $user_id;

        $data = json_decode(file_get_contents('php://input'), true);
        remove_from_cart($user_id, $data['product_id']);
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'total' => $_SESSION['cart']['total'],
            'count' => items_count(),
        ]);
        exit;
    }
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}
