<?php get_header() ?>

<section>
    <h2>Beverages</h2>
    <div class='card-container'>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('partials/content', 'menu-card'); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer() ?>