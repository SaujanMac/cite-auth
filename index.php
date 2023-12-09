<?php
require_once("./helper/redirect.php");
if ($_SESSION['auth']['username'] != null) {

    redirect("dashboard");
} else {
    redirect("login");
}
