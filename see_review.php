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
        <link rel="stylesheet" href="css/login.css">
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
        </article>

        <section id="review">
            <h2>Review of <?=$review['reviewer_username']?></h2>
            <p>Score: <?=$review['score']?></p>
            <?php if (strlen(trim($review['comment'])) > 0) { ?>
                <p>Comment: <?=$review['comment']?></p>
            <?php } ?>
        </section>

        <section id="replies">
            <?php foreach ($replies as $replie) { ?>
                <article class="replie">
                    <h3>Replie of <?=$replie['username']?></h3>
                    <p>Message: <?=$replie['message']?></p>
                </article>
            <?php } ?>
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

        </section>

        <a href="<?=$environment?>/userpage.php?username=<?=$_SESSION['username']?>">Go home</a>
    </body>
</html>
