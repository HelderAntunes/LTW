<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');

    if(!isset($_SESSION['username'])) // Prevent back button after logout
        header("Location: login.php");

    $user = get_user($_SESSION['username']);
    $restaurants = get_user_restaurants($_SESSION['username']);
    
    include('templates/header.php');
    include('templates/user_data.php');
    include('templates/my_restaurants.php');
    include('templates/search_section.php');
    include('templates/footer.php');
?>
