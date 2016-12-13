<section id="my_restaurants">
    <?php if (count($restaurants) > 0) { ?>
        <h2>Your restaurants</h2>
        <?php foreach ($restaurants as $restaurant) { ?>
            <article class="restaurant">
                <h3>Name: <?=$restaurant['name']?></h3>
                <p>Description: <?=$restaurant['description']?></p>
                <p>Local: <?=$restaurant['local']?></p>
                <a href="view_restaurant.php?id=<?=$restaurant['id']?>">View restaurant</a>
            </article>
        <?php } ?>
    <?php } else { ?>
        <h2>You have no restaurant.</h2>
    <?php } ?>
    <a id="add_restaurat" href="add_restaurant.php?username=<?=$user['username']?>">Add restaurant</a>
</section>