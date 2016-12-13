<?php if (user_is_owner_of_restaurant($_SESSION['username'], $restaurant['id'])) { ?>
    <a href="edit_restaurant.php?id=<?=$restaurant['id']?>">Edit restaurant</a>
    <a href="remove_restaurant.php?id=<?=$restaurant['id']?>">Remove restaurant</a>
    <a href="add_owner_to_restaurant.php?id=<?=$restaurant['id']?>">Add owner</a>
<?php } else {?>
    <a href="add_review.php?id=<?=$restaurant['id']?>">Add review</a>
<?php } ?>