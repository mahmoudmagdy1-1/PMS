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
}
