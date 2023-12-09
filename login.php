<?php
session_start();
require_once('./config/db.php');
require_once('./helper/helperFunction.php');
require_once('./helper/redirect.php');
// die('errr');

if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  //****************    Check User Existence  **********************


  // Method 1: --------------  Using prepared Statement

  // require_once('./config/sql.php');

  // // Prepare the statement
  // $stm = $conn->prepare($USER_EXISTENCE);

  // // Bind the statement
  // $stm->bind_param("ss", $username, $password);

  // // Set the parameters
  // $username = $_POST['username'];
  // $password = $_POST['password'];

  // // Execute the statement
  // $stm->execute();

  // // Get MySQL Result
  // $result = $stm->get_result();

  // // Closing the statement
  // $stm->close();


  // Method 2: --------------  WITHOUT Using prepared Statement
  require_once('./config/sql.php');
  $result = $conn->query($USER_EXISTENCE);

  if ($result->num_rows === 1) {
    $_SESSION['auth']['username'] = $username;
    redirect('./dashboard');
  } else {
    setFlashMessage('error', ' Invalid CREDENTIALS');
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
  require_once('./_partials/nav.php');
  ?>


  <h2>Login Form</h2>

  <form action="./login.php" method="POST">
    <div class="imgcontainer">
      <img src="./img/logo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">



      <?php
      require_once('./helper/flash.php');
      ?>



      <label for="username"><b>Username</b></label>
      <input id="username" type="text" placeholder="Enter Username" name="username">

      <label for="password"><b>Password</b></label>
      <input id="password" type="password" placeholder="Enter Password" name="password">

      <button type="submit" name="submit">Login</button>
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