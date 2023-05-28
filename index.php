<?php get_header() ?>

<h1>hello</h1>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
    // Display post content
    endwhile;
endif;
?>
    
<?php get_footer() ?>