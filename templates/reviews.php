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
                <a href="see_review.php?id=<?=$review['id']?>">See review</a>
            </section>

        <?php } ?>
    <?php } ?>
</section>