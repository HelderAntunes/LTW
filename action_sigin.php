<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/users.php');

  $username = trim(strip_tags($_POST['username']));
  $password = $_POST['password'];
  $email = trim($_POST['email']);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = "Error: invalid email!";
      header('Location: register.php');
  }
  else if (username_exists($username)) {
      $_SESSION['error'] = "Error: username already exists!";
      header('Location: register.php');
  }
  else {
      add_user($username, $password, $email, $_POST['birthdate']);
      $_SESSION['username'] = $username;
      header('Location: userpage.php'); 
  }
?>
