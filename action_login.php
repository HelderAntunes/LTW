<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/users.php');

  if (username_password_exists($_POST['username'], $_POST['password'])) {
      $_SESSION['username'] = $_POST['username'];

      $result = get_user($_POST['username']);

      if ($result['user_type'] === "owner") {
          echo 'owner page';
          header('Location: ownerpage.php?username='.$_POST['username']);
      }
      else if ($result['user_type'] === "reviewer") {
          echo 'reviewer page!!!';
      }
      else {
          echo 'some error!!!';
      }

  } else {
      echo 'ups';
  }

?>
