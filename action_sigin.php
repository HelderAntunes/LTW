<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/users.php');

  if (username_exists($_POST['username'])) {
      echo "nome ja exite!!!!"; /// TODO: Voltar à página anterior a avisar que a combinação de username e password está errada
  }
  else {
      add_user($_POST['username'], $_POST['password'], $_POST['email'],
            $_POST['birthdate']);
      $_SESSION['username'] = $_POST['username'];
      header('Location: userpage.php?username='.$_POST['username']); /// TODO: retirar 'usename' do POST por questões de segurança
  }
?>
