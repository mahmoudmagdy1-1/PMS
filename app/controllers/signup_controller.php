<?php
require_once("../app/models/signup_model.php");
require_once("../app/models/auth_model.php");
require_once("../app/models/cart_model.php");
require_once("../app/helpers/validation.php");

if (isset($_SESSION["user"])) {
    header('Location: .');
    exit;
}

function signup_handler()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach ($_POST as $key => $value) {
            $$key = sanitize_input($value);
        }

        $users = get_users();

        if (empty($name) || empty($email) || empty($password)) {
            $_SESSION['errors'][] = "All fields are required.";
        }

        $error = validate_length($name, 'name', 4, 24);
        if ($error) {
            $_SESSION['errors'][] = $error;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][] = "Please enter a valid email address.";
        }

        foreach ($users as $user) {
            if ($user['email'] == $email) {
                $_SESSION['errors'][] = "Email already exists.";
                break;
            }
        }

        $error = validate_length($password, 'password', 4, 64);
        if ($error) {
            $_SESSION['errors'][] = $error;
        }

        if (!empty($_SESSION['errors'])) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            $id = get_last_user() + 1;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $data = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "password" => $hashed_password,
                "role" => "user",
            );
            insert_user($data);
            $_SESSION["user"] = [
                'id' => $id,
                'name' => $name,
                'email' => $email,
            ];
            migrate_cart($id);
            header("Location: .");
            exit;
        }
    }
}

function signup_index()
{
    signup_handler();

    require('../app/views/layouts/header.php');
    require('../app/views/layouts/navbar.php');
    require('../app/views/auth/signup.php');
    require('../app/views/layouts/footer.php');
}
