<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/users.php');

  if (username_password_exists($_POST['username'], $_POST['password'])) { // test if user exists
      $_SESSION['username'] = $_POST['username'];
  }
  header('Location: test_login.php');
?>
