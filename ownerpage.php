<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');
    $user = get_user($_GET['username']);
    $restaurants = get_user_restaurants($_GET['username']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>FoodBook</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <h1>FoodBook</h1>

        <h2>Username: <?=$user['username']?></h2>
        <div id="imgchef">
            <img src="images/chef.jpg" alt="Chef">
        </div>
        <h2>Email: <?=$user['email']?></h2>
        <h2>Birthdate: <?=$user['birthdate']?></h2>

        <a href="">Edit profile</a>
        <form action="action_logout.php">
            <button type="submit">Logout</button>
        </form>

        <h2>Your restaurants</h2>
        <section id="restaurants">
            <?php foreach ($restaurants as $restaurant) { ?>
                <article>
                    <h3><?=$restaurant['name']?></h3>
                    <p><?=$restaurant['description']?></p>
                    <p><?=$restaurant['local']?></p>
                    <a href="">Edit</a>
                </article>
            <?php } ?>
        </section>
        <a href="">Add restaurant</a>

    </body>
</html>
