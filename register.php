<?php

require_once('./config/db.php');
require_once('./helper/helperFunction.php');
require_once('./helper/flash.php');
require_once('./helper/redirect.php');

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password === $confirm_password) {
    // echo "matched";
    // CHeck user existence
    $sql = "SELECT * FROM users WHERE username = '$username';";
    $conn->query($sql);

    if ($conn->affected_rows == 0) {
      if ($conn->connect_errno == 0) {
        // echo "connected ";
        echo $sql = "INSERT INTO users(username, password) VALUES('$username','$password');";
        $conn->query($sql);
        // print_r($conn);
        // setFlashMessage("success", "Data inserted successfully");
        require_once('./config/sql.php');
        $result = $conn->query($USER_EXISTENCE);

        if ($result->num_rows === 1) {
          $_SESSION['auth']['username'] = $username;
          redirect('./dashboard');
        } else {
          setFlashMessage('error', ' Invalid CREDENTIALS');
        }
      } else {
        die("error on connection");
      }
    } else {
      setFlashMessage("error", "Data not inserted");
    }
    // print_r($conn);
    // die;
    // print_r($conn);

  } else {
    setFlashMessage("error", "Password didnt match");
  }
}


?>


<!DOCTYPE html>
<html>

<head>
  <?php
  require_once('./_partials/head.php')
  ?>
</head>

<body>
  <?php
  require_once('./_partials/nav.php')
  ?>

  <h2>Registration Form</h2>

  <form action="./register.php" method="POST">
    <div class="imgcontainer">
      <img src="./img/logo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="username"><b>Username</b></label>
      <input id="username" type="text" placeholder="Enter Username" name="username">

      <label for="password"><b>Password</b></label>
      <input id="password" type="password" placeholder="Enter Password" name="password">


      <label for="confirm_password"><b>Confirm Password</b></label>
      <input id="confirm_password" type="password" placeholder="Enter Confirm Password" name="confirm_password">

      <button type="submit" name="submit">Register</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>

</body>

</html>