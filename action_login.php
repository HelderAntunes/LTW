<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/users.php');

  if (username_password_exists($_POST['username'], $_POST['password'])) {
      $_SESSION['username'] = $_POST['username'];

      $result = get_user($_POST['username']);

      if ($result['user_type'] === "owner") {
          header('Location: ownerpage.php?username='.$_POST['username']);
      }
      else if ($result['user_type'] === "reviewer") {
          header('Location: reviewerpage.php?username='.$_POST['username']);
      }
      else {
          echo 'some error!!!';
      }

  } else {
      echo 'ups';
  }

?>
