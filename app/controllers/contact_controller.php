<?php
require_once("../app/models/contact_model.php");
require_once("../app/helpers/validation.php");


function contact_index()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($_POST as $key => $value) {
            $$key = sanitize_input($value);
        }
        $timeStamp =  date("Y/m/d") . " " . date("h:i:sa");
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($message)) {
            $data = array(
                "name" => $name,
                "email" => $email,
                "message" => $message,
                "timeStamp" => $timeStamp,
            );
            insert_contact($data);
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
    require('../app/views/contact/contact.php');
    require('../app/views/layouts/footer.php');
}
