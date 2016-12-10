<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');
    include_once('database/images.php');
    include_once('database/reviews.php');
    include_once('database/replies.php');

    $user = get_user($_SESSION['username']);
    $review = get_review($_GET['id']);
    $replies = get_replies_of_a_review($_GET['id']);
    $restaurant = get_restaurant($review['restaurant_id']);
    $images = get_images_of_restaurant($restaurant['id']);
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

        <article id="restaurant">
            <h2>Restaurant data</h2>
            <h3>Name: <?=$restaurant['name']?></h3>
            <h3>Description: <?=$restaurant['description']?></h3>
            <h3>Local: <?=$restaurant['local']?></p>
            <section id="images">
                <?php foreach ($images as $image) { ?>
                    <article class="image">
                        <img src="images/thumbs_small/<?=$image['id']?>.jpg">
                    </article>
                <?php } ?>
            </section>
        </article>

        <section id="review">
            <h3>Review of <?=$review['reviewer_username']?></h3>
            <p>Score: <?=$review['score']?></p>
            <?php if (strlen(trim($review['comment'])) > 0) { ?>
            <p>Comment: <?=$review['comment']?></p>
            <?php } ?>

            <section id="replies">
            <?php foreach ($replies as $replie) { ?>
                <article class="replie">
                    <h3>Replie of <?=$replie['username']?></h3>
                    <p>Message: <?=$replie['message']?></p>
                </article>
            <?php } ?>
            </section>

        </section>

         <?php if (user_is_owner_of_restaurant($_SESSION['username'], $restaurant['id'])) { ?>
                <form action="action_add_reply.php" method="post">
                    <label>Message:
                        <input type="text" value="" name="message" required>
                    </label>
                    <input type="hidden" name="review_id" value=<?=$_GET['id']?> >
                    <input type="hidden" name="username" value=<?=$_SESSION['username']?> >
                    <input type="submit" value="Reply">
                </form>
            <?php } ?>

        <a href="<?=$environment?>/userpage.php?username=<?=$_SESSION['username']?>">Go home</a>
    </body>
</html>
