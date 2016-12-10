<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/users.php');

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

            <form id="edit_user" action="action_edit_user.php" method="post" enctype="multipart/form-data">
            <!--<h2>Personal data</h2>-->
                <h3>Username: <?=$user['username']?></h3>
                <input type="hidden" value=<?=$user['username']?> name="username" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <label>New Password:</label>
                <input type="password" name="new_password">
                <label>Email:</label>
                <input type="email" value=<?=$user['email']?> name="email" required>
                <label>Birthdate:</label>
                <input type="date" value=<?=$user['birthdate']?> name="birthdate" required>
                <button type="submit">Edit profile</button>
            </form>

            <div id="user_links">
                <a href="<?=$environment?>/userpage.php">Back</a>
                <a href="<?=$environment?>/action_logout.php">Log out</a>
            </div>


    </body>
</html>
