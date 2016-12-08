<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');

    $restaurant = get_restaurant($_GET['id']);
    $user = get_user($_SESSION['username']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>FoodBook</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <h1>FoodBook</h1>
        </div>

        <div id="imgchef">
            <img src="images/chef.jpg" alt="Chef">
        </div>

        <div id="user">
            <div id="user_data">
            <h2>Personal data</h2>
                <h3>Username: <?=$user['username']?></h3>
                <h3>Email: <?=$user['email']?></h3>
                <h3>Birthdate: <?=$user['birthdate']?></h3>
            </div>

            <div id="user_links">
                <a href="">Edit profile</a>
                <a href="<?=$environment?>/action_logout.php">Log out</a>
            </div>
        </div>

        <form id="edit_restaurant_form" action="action_edit_restaurant.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <label><b>Name:</b></label>
            <input type="text" value=<?=$restaurant['name']?> name="name" required>
            <label><b>Description:</b></label>
            <textarea rows="4" cols="50" name="description" required><?=$restaurant['description']?></textarea>
            <label><b>Local:</b></label>
            <input type="text" value=<?=$restaurant['local']?> name="local" required>
            <button type="submit">Edit restaurant</button>
        </form>

    </body>
</html>
