<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
    ///session_start();
    include_once('database/connection.php');
    include_once('database/users.php');

    $user = get_user($_POST['username']);
    if($user['password'] == sha1($_POST['password'])){
      if($_POST['new_password'] == ""){
        $password=sha1($_POST['password']);
        update_user($_POST['username'], $password, $_POST['email'], $_POST['birthdate']);
      }
      else{
        $new_password=sha1($_POST['new_password']);
        update_user($_POST['username'], $new_password, $_POST['email'], $_POST['birthdate']);
      }
      //echo $password;
      //echo $new_password;
      header("Location: userpage.php?id=".$_POST['username']);
    }
    else{
      $message = "wrong password";
      echo "<script type='text/javascript'> alert('$message');  window.history.go(-1); </script>";
    }


?>
