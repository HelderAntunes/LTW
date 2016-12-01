<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');

    $restaurant = get_restaurant($_GET['id']);
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

        <div id="imgchef">
            <img src="images/chef.jpg" alt="Chef">
        </div>

        <form action="action_edit_restaurant.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <label>Name:
                <input type="text" value=<?=$restaurant['name']?> name="name" required>
            </label>
            <label>Description:
                <textarea rows="4" cols="50" name="description" required><?=$restaurant['description']?></textarea>
            </label>
            <label>Local:
                <input type="text" value=<?=$restaurant['local']?> name="local" required>
            </label>
            <input type="submit" value="Edit restaurant">
        </form>

    </body>
</html>
