<?php
    session_start();
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/reviews.php');
    
    add_review($_POST['score'], $_POST['comment'], $_POST['restaurant_id'], $_SESSION['username']);
    header("Location: view_restaurant.php?id=".$_POST['restaurant_id']);
?>
