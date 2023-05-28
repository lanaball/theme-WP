<?php
function add_my_assets()
{
    // links style and javascript
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');

    // material UI icons
    wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,200,0,200');

}
add_action('wp_enqueue_scripts', 'add_my_assets');







function add_my_theme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
    add_theme_support('menus');
}
add_action('after_setup_theme', 'add_my_theme_supports');







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






function add_beverage_post_type()
{
    register_post_type('beverage', array(
        'labels' => array(
            'name' => __('Beverages'),
            'singular_name' => __('Beverage'),
            'add_new_item' => 'Add New Beverage',
            'edit_item' => 'Edit Beverage',
            'all_items' => 'All Beverages',
            'view_item' => 'View Beverage',
            'search_items' => 'Search Beverages',
            'not_found' => 'No Beverages Found',
            'not_found_in_trash' => 'No Beverages Found in Trash',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' => array('beverage-type'),
    ));
}
add_action('init', 'add_beverage_post_type');






function add_beverage_taxonomy()
{
    register_taxonomy('beverage-type', 'beverage', array(
        'labels' => array(
            'name' => __('Beverage Types'),
            'singular_name' => __('Beverage Type'),
            'add_new_item' => 'Add New Beverage Type',
            'edit_item' => 'Edit Beverage Type',
            'all_items' => 'All Beverage Types',
            'view_item' => 'View Beverage Type',
            'search_items' => 'Search Beverage Types',
            'not_found' => 'No Beverage Types Found',
            'not_found_in_trash' => 'No Beverage Types Found in Trash',
        ),
        'public' => true,
        'hierarchical' => true,
    ));
}
add_action('init', 'add_beverage_taxonomy');






function my_disable_gutenberg($current_status, $post_type)
{

    // Disabled post types
    $disabled_post_types = array('beverage');

    // Change $can_edit to false for any post types in the disabled post types array
    if (in_array($post_type, $disabled_post_types, true)) {
        $current_status = false;
    }

    return $current_status;
}
add_filter('use_block_editor_for_post_type', 'my_disable_gutenberg', 10, 2);