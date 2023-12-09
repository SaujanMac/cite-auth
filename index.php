<?php
session_start();
require_once("./helper/redirect.php");


if (isset($_GET['logout'])) {
    unset($_SESSION['auth']['username']);
}

redirect("login");

if (isset($_SESSION['auth']['username'])) {

    redirect("dashboard");
}
