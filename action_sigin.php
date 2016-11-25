<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/users.php');

  if (username_exists($_POST['username'])) {
      echo "nome ja exite!!!!";
  }
  else {
      add_user($_POST['username'], $_POST['password'], $_POST['email'],
            $_POST['birthdate'], $_POST['usertype']);
      $_SESSION['username'] = $_POST['username'];
      echo $_POST['usertype'];
  }
?>
