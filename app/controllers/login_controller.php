<?php
require_once("../app/models/login_model.php");
require_once("../app/helpers/validation.php");


function login_index()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($_POST as $key => $value) {
            $$key = sanitize_input($value);
        }

        if (empty($email) || empty($password)) {
            $_SESSION['errors'][] = "Both fields are required.";
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][] = "Please enter a valid email address.";
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }
        $users = get_users();
        foreach ($users as $user) {
            if ($user['email'] == $email) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION["user"] = [
                        'id' => $id,
                        'name' => $name,
                        'email' => $email,
                    ];
                    header('Location: .');
                    exit;
                } else {
                    $_SESSION['errors'][] = "Password doesn't match.";
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                    exit();
                }
            }
        }
        if (!isset($_SESSION["user"])) {
            $_SESSION['errors'][] = "Email and Password are incorrect.";
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    require('../app/views/layouts/header.php');
    require('../app/views/layouts/navbar.php');
    require('../app/views/auth/login.php');
    require('../app/views/layouts/footer.php');
}
