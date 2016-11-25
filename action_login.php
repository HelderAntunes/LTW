<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/users.php');

  if (username_password_exists($_POST['username'], $_POST['password'])) {
      $_SESSION['username'] = $_POST['username'];
      echo 'sucessful log in.';
  } else {
      echo 'ups';
  }

?>
