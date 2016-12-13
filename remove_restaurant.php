<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');

    include('templates/header.php');
    include('templates/form_remove_restaurant.php');
    include('templates/go_home_link.php');
    include('templates/footer.php');
?>
