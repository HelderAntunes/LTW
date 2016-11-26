<?php
    session_start();
    if (session_destroy() === true) {
        header('Location: login.php');
    } else {
        echo 'nao destuiu';
    }
 ?>
