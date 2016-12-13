<section id="review">
    <h3>Review of <?=$review['reviewer_username']?></h3>
    <p>Score: <?=$review['score']?></p>
    <?php if (strlen(trim($review['comment'])) > 0) { ?>
    <p>Comment: <?=$review['comment']?></p>
    <?php } ?>
</section>