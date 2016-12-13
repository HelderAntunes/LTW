<section id="add_reply">
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