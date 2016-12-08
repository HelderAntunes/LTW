<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');
    include_once('database/images.php');

    $user = get_user($_SESSION['username']);
    $restaurant = get_restaurant($_GET['id']);
    $images = get_images_of_restaurant($restaurant['id']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>FoodBook</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>FoodBook</h1>

        <h2>Username: <?=$user['username']?></h2>
        <div id="imgchef">
            <img src="images/chef.jpg" alt="Chef">
        </div>

        <article id="restaurant">
            <h3>Name: <?=$restaurant['name']?></h3>
            <p>Description: <?=$restaurant['description']?></p>
            <p>Local: <?=$restaurant['local']?></p>
            <section id="images">
                <?php foreach ($images as $image) { ?>
                    <article class="image">
                        <img src="images/thumbs_small/<?=$image['id']?>.jpg">
                    </article>
                <?php } ?>
            </section>

            <form id="review_form" action="action_add_review.php" method="post">
                <input type="hidden" name="restaurant_id" value=<?=$_GET['id']?> >
                <label>Comment:
                    <textarea rows="4" cols="50" name="comment"> </textarea>
                </label>
                <label>Score:
                    <input type="number" name="score" value="3" min="1" max="5" step="1">
                </label>
                <button type="submit">Submit review</button>
            </form>
        </article>
        <a href="<?=$environment?>/userpage.php?username=<?=$_SESSION['username']?>">Go home</a>
    </body>
</html>
