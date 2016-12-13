<section id="replies">
    <?php foreach ($replies as $replie) { ?>
        <section class="replie">
            <h3>Replie of <?=$replie['username']?></h3>
            <p>Message: <?=$replie['message']?></p>
        </section>
    <?php } ?>
</section>