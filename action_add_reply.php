<?php
    session_start();
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    include_once('database/replies.php');

    add_reply($_POST['message'], $_POST['review_id'], $_POST['username']);
    header("Location: see_review.php?id=".$_POST['review_id']);
?>
