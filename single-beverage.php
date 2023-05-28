<?php get_header() ?>

<?php
if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>


        <h1><?php the_title(); ?></h1>
        <img src="<?php the_field('beverage_image'); ?>" alt="A picture of a <?php the_title(); ?>">
        <p>$<?php the_field('price'); ?></p>
        <p><?php the_field('beverage_description'); ?></p>

    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer() ?>