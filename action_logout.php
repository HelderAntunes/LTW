<?php
    session_start();
    session_unset();
    
    if (session_destroy() === true) {
        header('Location: login.php');
    } else {
        echo 'nao destuiu';
    }
 ?>
