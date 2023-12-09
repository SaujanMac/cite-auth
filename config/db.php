<?php
require_once('./helper/helperFunction.php');
require_once('./helper/flash.php');
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'cite-auth';

try {
    $conn = new mysqli($server, $username, $password, $database);
} catch (Exception $e) {
    setFlashMessage('success', $e->getMessage());
    die("err on connection");
}
