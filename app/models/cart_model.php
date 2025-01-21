<?php
require_once('../app/helpers/json_handler.php');

function get_carts()
{
    return read_json('../app/storage/JSON/carts.json');
}

function get_user_cart($user_id)
{
    $carts = get_carts();
    $cart_index = array_search($user_id, array_column($carts, 'user_id'));
    if (is_numeric($cart_index)) {
        return $carts[$cart_index];
    }

    return ['user_id' => $user_id, 'items' => [], 'total' => 0];
}

function add_to_cart($user_id, $product_id, $quantity)
{
    $cart = $_SESSION['cart'];

    $item_index = array_search($product_id, array_column($cart['items'], 'product_id'));
    if ($item_index !== false) {
        $cart['items'][$item_index]['quantity'] += $quantity;
        $cart['items'][$item_index]['subtotal'] = $cart['items'][$item_index]['quantity'] * $cart['items'][$item_index]['price'];
    } else {
        $product = get_product_by_id($product_id);
        if ($product) {
            $cart['items'][] = [
                'product_id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'subtotal' => $quantity * $product['price'],
            ];
        }
    }
    $final = 0;
    foreach ($cart['items'] as $item) {
        $final += $item['subtotal'];
    }
    $cart['total'] = round($final, 2);
    $_SESSION['cart'] = $cart;
    save_cart($user_id, $cart);
}

function remove_from_cart($user_id, $product_id)
{
    $cart = $_SESSION['cart'];

    // Find the index of the product to remove
    $item_index = array_search($product_id, array_column($cart['items'], 'product_id'));

    if ($item_index !== false) {
        // Remove the item from the cart
        unset($cart['items'][$item_index]);

        // Reindex the array to avoid gaps in keys
        $cart['items'] = array_values($cart['items']);

        // Recalculate the total
        $cart['total'] = 0;
        foreach ($cart['items'] as $item) {
            $cart['total'] += $item['subtotal'];
        }

        // Update the session cart
        $_SESSION['cart'] = $cart;

        // If the user is logged in, save the updated cart to persistent storage
        save_cart($user_id, $cart);
    }
}


function migrate_cart($user_id)
{
    $guest_cart = $_SESSION['cart'];
    $user_cart = get_user_cart($user_id);
    if (empty($user_cart)) {
        $guest_cart["user_id"] = $user_id;
        $_SESSION['cart'] = $guest_cart;
        save_cart($user_id, $guest_cart);
    } else {
        foreach ($guest_cart['items'] as $guest_item) {
            $item_index = array_search($guest_item['product_id'], array_column($user_cart['items'], 'product_id'));

            if ($item_index !== false) {
                $user_cart['items'][$item_index]['quantity'] += $guest_item['quantity'];
                $user_cart['items'][$item_index]['subtotal'] =
                    $user_cart['items'][$item_index]['quantity'] * $user_cart['items'][$item_index]['price'];
            } else {
                $user_cart['items'][] = $guest_item;
            }
        }
        $total = 0;
        foreach ($user_cart['items'] as &$item) {
            $item['subtotal'] = $item['quantity'] * $item['price'];
            $total += $item['subtotal'];
        }

        $user_cart['total'] = $total;
        $_SESSION['cart'] = $user_cart;
        save_cart($user_id, $user_cart);
    }
    remove_guest_cart();
}

function remove_guest_cart()
{
    $carts = get_carts(); // Fetch all carts

    // Iterate over the carts and keep only those with user_id not equal to 0
    foreach ($carts as $index => $cart) {
        if ($cart['user_id'] === 0) {
            unset($carts[$index]); // Remove the guest cart
        }
    }

    // Save the remaining carts back to the JSON file
    save_carts(array_values($carts)); // Reindex the array
}


function save_cart($user_id, $cart)
{
    $carts = get_carts();
    $cart_index = array_search($user_id, array_column($carts, 'user_id'));

    if (is_numeric($cart_index)) {
        $carts[$cart_index] = $cart;
    } else {
        $carts[] = $cart;
    }

    replace_json('../app/storage/JSON/carts.json', $carts);
}

function save_carts($carts)
{
    replace_json('../app/storage/JSON/carts.json', $carts);
}

function items_count()
{
    $count = 0;
    foreach ($_SESSION['cart']['items'] as $item) {
        $count += $item['quantity'];
    }
    return $count;
}
