<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');

    if(!isset($_SESSION['username'])) // Prevent back button after logout
        header("Location: login.php");

    $user = get_user($_SESSION['username']);
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

        <form id="search" method="get">
        	<label for="name">Name</label>
        	   <input id="name" name="name" placeholder="Type the name of restaurant" />
        	<button id="buttonsearch" type="button">Search restaurant</button>
        </form>

        <section id="restaurants"></section>

    </body>
</html>
