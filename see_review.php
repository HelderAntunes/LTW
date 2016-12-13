<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');
    include_once('database/images.php');
    include_once('database/reviews.php');
    include_once('database/replies.php');

    $user = get_user($_SESSION['username']);
    $review = get_review($_GET['id']);
    $replies = get_replies_of_a_review($_GET['id']);
    $restaurant = get_restaurant($review['restaurant_id']);
    $images = get_images_of_restaurant($restaurant['id']);

    include('templates/header.php');
    include('templates/user_data.php');
    include('templates/open_div.php');
    include('templates/restaurant.php');
    include('templates/images.php');
    include('templates/close_div.php');
    include('templates/open_div.php');
    include('templates/review.php');
    include('templates/replies.php');
    include('templates/close_div.php');
    include('templates/add_reply_form.php');
    include('templates/go_home_link.php');
    include('templates/footer.php');

?>