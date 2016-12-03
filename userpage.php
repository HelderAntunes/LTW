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
        <link href="https://fonts.googleapis.com/css?family=Bungee|Indie+Flower" rel="stylesheet">
        <script
          src="https://code.jquery.com/jquery-1.12.4.js"
          integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
          crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="<?=$environment?>/script.js"></script>
    </head>
    <body>
        <div id="header">
            <h1>FoodBook</h1>
        </div>

        <div id="imgchef">
            <img src="images/chef.jpg" alt="Chef">
        </div>

        <div id="user_data">
            <h2>Personal data</h2>
            <h3>Username: <?=$user['username']?></h3>
            <h3>Email: <?=$user['email']?></h3>
            <h3>Birthdate: <?=$user['birthdate']?></h3>
        </div>

        <div id="user_links">
            <ul>
				<li><a href="">Edit profile</a></li>
				<li><a href="<?=$environment?>/action_logout.php">Log out</a></li>
			</ul>
        </div>

        <section id="my_restaurants">
        <?php if (count($restaurants) > 0) { ?>
            <h2>Your restaurants</h2>
            <?php foreach ($restaurants as $restaurant) { ?>
                <article class="restaurant">
                    <h3><?=$restaurant['name']?></h3>
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

        <form id="search" action="restaurants_found.php" method="get">
        	<label for="name">Name</label>
        	   <input name="name" placeholder="Type the name of restaurant" />
        	<button type="submit">Search restaurant</button>
        </form>

    </body>
</html>
