<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');

    if (!user_is_owner_of_restaurant($_SESSION['username'], $_GET['id'])) {
        die;
    }
    $restaurant = get_restaurant($_GET['id']);
    $user = get_user($_SESSION['username']);

    include('templates/header.php');
    include('templates/user_data.php');
    include('templates/form_edit_restaurant.php');
    include('templates/go_home_link.php');
    include('templates/footer.php');
?>