<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');
    include_once('database/images.php');

    $user = get_user($_SESSION['username']);
    $restaurant = get_restaurant($_GET['id']);
    $images = get_images_of_restaurant($restaurant['id']);

    include('templates/header.php');
    include('templates/user_data.php');
    include('templates/open_div.php');
    include('templates/restaurant.php');
    include('templates/images.php');
    include('templates/close_div.php');
    include('templates/form_review.php');
    include('templates/go_home_link.php');
    include('templates/footer.php');
?>
