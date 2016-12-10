<?php
    include_once('database/connection.php');
    include_once('database/restaurants.php');

    update_restaurant($_POST['id'], $_POST['name'], $_POST['description'], $_POST['local']);

    header("Location: view_restaurant.php?id=".$_POST['id']);
?>
