<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'cite-auth';

try {
    $conn = new mysqli($server, $username, $password, $database);
} catch (Exception $e) {
    echo $e->getMessage();
    die("err on connection");
}
