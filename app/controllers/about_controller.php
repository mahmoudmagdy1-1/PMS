<?php
require_once("../app/models/goals_model.php");



function about_index()
{
    $goals = get_all_goals();

    require('../app/views/layouts/header.php');
    require('../app/views/layouts/navbar.php');
    require('../app/views/about/about.php');
    require('../app/views/layouts/footer.php');
}
