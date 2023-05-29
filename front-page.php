<?php get_header() ?>

<section class="hero" style="background-image: url()">
    <div class="hero__text">
        <h1>Hero Text</h1>
        <h2>Site tagline goes here</h2>
    </div>
    <a href="#" class="cta-button">see menu</a>
</section>

<?php
if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
<?php endif; ?>



<?php get_footer() ?>