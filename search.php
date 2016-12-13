<?php
    include_once("config/config.php");
    include_once('database/connection.php');
    include_once('database/restaurants.php');

    $restaurants = search_restaurants($_GET['name']);
?>
<?php if(empty($restaurants)) { ?>
        <p>No restaurant found.</p>
<?php }
    else { ?>
        <?php foreach ($restaurants as $restaurant) {?>
            <article class="restaurant">
                <h3>Name: <?=$restaurant['name']?></h3>
                <p>Description: <?=$restaurant['description']?></p>
                <p>Local: <?=$restaurant['local']?></p>
                <a href="view_restaurant.php?id=<?=$restaurant['id']?>">View restaurant</a>
            </article>
        <?php } ?>
<?php } ?>
