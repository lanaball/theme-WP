<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brews and Beans</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header>
        <nav>
            <div class="main-navigation__container">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary-menu',
                    )
                );
                ?></div>
        </nav>
    </header>