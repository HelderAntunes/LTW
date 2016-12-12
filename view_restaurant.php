<?php
    session_start();
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/users.php');
    include_once('database/images.php');
    include_once('database/reviews.php');

    $user = get_user($_SESSION['username']);
    $restaurant = get_restaurant($_GET['id']);
    $images = get_images_of_restaurant($restaurant['id']);
    $reviews = get_reviews_of_restaurant($restaurant['id']);
    $owners_username = get_owners_username_of_a_restaurant($restaurant['id']);
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
                <a href="<?=$environment?>/edit_profile.php">Edit profile</a>
                <a href="<?=$environment?>/action_logout.php">Log out</a>
            </div>
        </div>

        <article id="restaurant">
            <h2>Restaurant data</h2>
            <h3>Name: <?=$restaurant['name']?></h3>
            <h3>Description: <?=$restaurant['description']?></p>
            <h3>Local: <?=$restaurant['local']?></p>
        <form action="action_remove_restaurant.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="restaurant_id" value=<?=$_GET['id']?>>
            <input type="hidden" name="owner_username" value=<?=$_GET['username']?>>
            <input type="submit" value="Remove restaurant">
        </form>
            <section id="images">
                <?php foreach ($images as $image) { ?>
                    <article class="image">
                        <img src="images/thumbs_small/<?=$image['id']?>.jpg">
                    </article>
                <?php } ?>
            </section>
            <section id="owners">
                <h2>Owners:</h2>
                <?php foreach ($owners_username as $owner) { ?>
                    <p><?=$owner['username']?></p>
                <?php } ?>
            </section>

        <form action="action_add_ownertorestaurant.php" method="post">
            <label><b>Username:</b></label>
            <input type="hidden" name="restaurant_id" value=<?=$_GET['id']?>>
            <input type="text" placeholder="Enter Username" name="username" required>
            <button id="add_btn" type="submit">ADD Owner</button>
        </form>

            <section id="reviews">
                <?php if (count($reviews) > 0) { ?>
                    <h2>Reviews</h2>
                    <?php foreach ($reviews as $review) { ?>
                        <section class="review">
                            <h3>Review of <?=$review['reviewer_username']?></h2>
                            <p>Score: <?=$review['score']?></p>
                            <?php if (strlen(trim($review['comment'])) > 0) { ?>
                                <p>Comment: <?=$review['comment']?></p>
                            <?php } ?>
                            <a href="<?=$environment?>/see_review.php?id=<?=$review['id']?>">See review</a>
                        </section>

                    <?php } ?>
                <?php } ?>
            </section>

            <?php if (user_is_owner_of_restaurant($_SESSION['username'], $restaurant['id'])) { ?>
                <a href="<?=$environment?>/edit_restaurant.php?id=<?=$restaurant['id']?>">Edit restaurant</a>
            <?php } else {?>
                <a href="<?=$environment?>/add_review.php?id=<?=$restaurant['id']?>">Add review</a>
            <?php } ?>
        </article>

        <a href="<?=$environment?>/userpage.php?username=<?=$_SESSION['username']?>">Go home</a>

    </body>
</html>
