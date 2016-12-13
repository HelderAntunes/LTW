<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');

    if (!user_is_owner_of_restaurant($_SESSION['username'], $_GET['id'])) {
        $message = "invalid operation";
        echo "<script type='text/javascript'> alert('$message');  window.history.go(-1); </script>";
        exit;
    }

    $user = get_user($_SESSION['username']);
    $restaurant = get_restaurant($_GET['id']);

    include('templates/header.php');
    include('templates/error_message.php');
    include('templates/form_add_owner_to_restaurant.php');
    include('templates/go_home_link.php');
    include('templates/footer.php');
?>
