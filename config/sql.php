<?php

// User

$USER_CREATE_TABLE = "";

// $USER_EXISTENCE = "SELECT * FROM users WHERE username = ? and password = ? ;";                   // for method 1
$USER_EXISTENCE = "SELECT * FROM users WHERE username = '$username' and password = '$password' ;";  // for method 2
// die;

