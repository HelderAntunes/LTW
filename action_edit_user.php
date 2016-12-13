<?php

    ini_set('display_errors', 'On');
    error_reporting(E_ALL | E_STRICT);
    session_start();
    include_once('database/connection.php');
    include_once('database/users.php');

    $username = trim(strip_tags($_POST['username']));
    $password = $_POST['password'];

    if ($_SESSION['username'] != $username) {
      $message = "invalid operation";
      echo "<script type='text/javascript'> alert('$message');  window.history.go(-1); </script>";
    }

    $user = get_user($username);
    if(username_password_exists($username, $password)) {
      if($_POST['new_password'] == "") {
        update_user($_POST['username'], $password, $_POST['email'], $_POST['birthdate']);
      }
      else {
        update_user($_POST['username'], $_POST['new_password'], $_POST['email'], $_POST['birthdate']);
      }
     
      header("Location: userpage.php?");
    }
    else {
      $message = "wrong password";
      echo "<script type='text/javascript'> alert('$message');  window.history.go(-1); </script>";
    }


?>
