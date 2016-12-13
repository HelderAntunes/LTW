<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/users.php');

    $user = get_user($_SESSION['username']);

    include('templates/header.php');
    include('templates/user_data.php');
    include('templates/form_edit_profile.php');
    include('templates/go_home_link.php');
    include('templates/footer.php');
?>