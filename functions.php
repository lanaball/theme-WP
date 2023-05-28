<?php
function add_my_assets()
{
    // links style and javascript
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');

    // material UI icons
    wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,200,0,200');

}
add_action('wp_enqueue_scripts', 'add_my_assets');


// ------------------- navigation custom function -------------------
function add_my_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu'),
            'secondary-menu' => __('Secondary Menu'),
        )
    );
}
add_action('init', 'add_my_menus');




function add_coffee_post_type()
{
    $labels = array(
        'name' => 'New Coffee',
        'singular_name' => 'New Coffee',
        'menu_name' => 'New Coffee',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Custom Post',
        'edit' => 'Edit',
        'edit_item' => 'Edit Custom Post',
        'new_item' => 'New Custom Post',
        'view' => 'View',
        'view_item' => 'View Custom Post',
        'search_items' => 'Search Custom Posts',
        'not_found' => 'No custom posts found',
        'not_found_in_trash' => 'No custom posts found in trash',
        'parent' => 'Parent Custom Post'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'coffee_post'),
        'capability_type' => 'post',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies' => array('category', 'post_tag', 'publications', 'surveys', 'events', 'circular'), // Add taxonomies if needed
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-post', // Customize the menu icon
        'show_in_rest' => true // Enable Gutenberg editor support
    );

    register_post_type('coffee_post', $args);
}
add_action('init', 'add_coffee_post_type');


function coffee_types_taxonomy()
{
    $labels = array(
        'name'              => _x('Local Branches', 'taxonomy general name'),
        'singular_name'     => _x('Local Branch', 'taxonomy singular name'),
        'search_items'      => __('Search Local Branches'),
        'all_items'         => __('All Local Branches'),
        'parent_item'       => __('Parent Local Branch'),
        'parent_item_colon' => __('Parent Local Branch:'),
        'edit_item'         => __('Edit Local Branch'),
        'update_item'       => __('Update Local Branch'),
        'add_new_item'      => __('Add New Local Branch'),
        'new_item_name'     => __('New Local Branch Name'),
        'menu_name'         => __('Local Branches'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'coffee-types'),
    );

    register_taxonomy('coffee-types', array('post'), $args);
}
add_action('init', 'coffee_types_taxonomy');