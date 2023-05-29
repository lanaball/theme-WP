<div class="card beverage--card">
    <h3 class="card__title"><?php the_title(); ?></h3>
    <p class="card__price">$<?php the_field('price'); ?></p>
    <img class="card__image" src="<?php the_field('beverage_image'); ?>" alt="A picture of a <?php the_title(); ?>">

    <p class="card__description"><?php the_field('beverage_description'); ?></p>
</div>