<?php
session_start();

$url = $_GET["url"] ?? '/';

switch ($url) {
    case '/':
        require_once("../app/controllers/home_controller.php");
        home_index();
        break;
    case "about":
        require_once("../app/controllers/about_controller.php");
        about_index();
        break;
    case "contact":
        require_once("../app/controllers/contact_controller.php");
        contact_index();
        break;
    case "signup":
        require_once("../app/controllers/signup_controller.php");
        signup_index();
        break;
    case "login":
        require_once("../app/controllers/login_controller.php");
        login_index();
        break;
    case "logout":
        require_once("../app/controllers/logout_controller.php");
        logout_index();
        break;
}
