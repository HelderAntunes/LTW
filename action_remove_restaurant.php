<?php
    session_start();
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/images.php');

    remove_restaurant($_POST['restaurant_id']);
    header("Location: userpage.php?username=".$_POST['owner_username']);



?>
