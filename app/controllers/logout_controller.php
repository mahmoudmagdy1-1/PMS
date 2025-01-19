<?php

function logout_index()
{
    if (isset($_SESSION["user"])) {
        session_unset();
        header("Location: .");
        exit;
    }
}
