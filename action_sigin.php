<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/users.php');

  if (username_exists($_POST['username'])) {
      $_SESSION['error'] = "Error: username already exists!";
      header('Location: register.php');
  }
  else {
      add_user($_POST['username'], $_POST['password'], $_POST['email'],
            $_POST['birthdate']);
      $_SESSION['username'] = $_POST['username'];
      header('Location: userpage.php'); 
  }
?>
