<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');

    $restaurants_found = search_restaurants($_GET['name']);
    $restaurants = [];
    foreach ($restaurants_found as $r) {
        if (user_is_owner_of_restaurant($_SESSION['username'], $r['id'])) {
            continue;
        } else {
            $restaurants[] = $r;
        }
    }
    $user = get_user($_SESSION['username']);
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

        <div id="header">
            <h1>FoodBook</h1>
        </div>

        <div id="imgchef">
            <img src="images/chef.jpg" alt="Chef">
        </div>

        <div id="user_data">
            <h2>personal data</h2>
            <h3>Username: <?=$user['username']?></h2>
            <h3>Email: <?=$user['email']?></h2>
            <h3>Birthdate: <?=$user['birthdate']?></h2>
        </div>

        <div id="user_links">
            <a href="">Edit profile</a>
            <a href="<?=$environment?>/action_logout.php">Log out</a>
        </div>

        <section id="restaurants_found">
            <?php if (count($restaurants) > 0) { ?>
                <h2>Restaurants found</h2>
                <?php foreach ($restaurants as $restaurant) { ?>
                    <article class="restaurant">
                        <h3>Name: <?=$restaurant['name']?></h3>
                        <p>Description: <?=$restaurant['description']?></p>
                        <p>Local: <?=$restaurant['local']?></p>
                        <a href="<?=$environment?>/view_restaurant.php?id=<?=$restaurant['id']?>">View restaurant</a>
                    </article>
                <?php } ?>
            <?php } else { ?>
                <h2>No restaurant found.</h2>
            <?php } ?>
        </section>

        <a href="<?=$environment?>/userpage.php?username=<?=$_SESSION['username']?>">Go home</a>
    </body>
</html>
