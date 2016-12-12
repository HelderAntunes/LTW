<?php
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');

    add_owner_to_restaurant($_POST['restaurant_id'], $_POST['username']);

    header("Location: view_restaurant.php?id=".$_POST['restaurant_id']);
?>
