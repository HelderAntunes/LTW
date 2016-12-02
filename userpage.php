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
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>FoodBook</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/login.css">
        <script
          src="https://code.jquery.com/jquery-1.12.4.js"
          integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
          crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="<?=$environment?>/script.js"></script>
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

        <section id="my_restaurants">
        <?php if (count($restaurants) > 0) { ?>
            <h2>Your restaurants</h2>
            <?php foreach ($restaurants as $restaurant) { ?>
                <article class="restaurant">
                    <h3>Name: <?=$restaurant['name']?></h3>
                    <p>Description: <?=$restaurant['description']?></p>
                    <p>Local: <?=$restaurant['local']?></p>
                    <a href="<?=$environment?>/view_restaurant.php?id=<?=$restaurant['id']?>">View restaurant</a>
                </article>
            <?php } ?>
        <?php } else { ?>
            <h2>You have no restaurant.</h2>
        <?php } ?>
        </section>

        <a href="<?=$environment?>/add_restaurant.php?username=<?=$user['username']?>">Add restaurant</a>

        <form id="search" method="get">
        	<label for="name">Name</label>
        	   <input id="name" name="name" placeholder="Type the name of restaurant" />
        	<button id="buttonsearch" type="button">Search restaurant</button>
        </form>

        <section id="restaurants_found"></section>

    </body>
</html>
