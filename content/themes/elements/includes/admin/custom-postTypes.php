<?php
function custom_type_week() {
  $post_type = 'week';

  $labels = array(
    'name'               => __( 'Weeks', 'tamed-types' ),
    'singular_name'      => __( 'Week', 'tamed-types' ),
    'menu_name'          => __( 'Weeks', 'tamed-types' ),
    'name_admin_bar'     => __( 'Week', 'tamed-types' ),
    'add_new'            => __( 'Add New', 'tamed-types' ),
    'add_new_item'       => __( 'Add New Week', 'tamed-types' ),
    'new_item'           => __( 'New Week', 'tamed-types' ),
    'edit_item'          => __( 'Edit Week', 'tamed-types' ),
    'view_item'          => __( 'View Week', 'tamed-types' ),
    'all_items'          => __( 'All Weeks', 'tamed-types' ),
    'search_items'       => __( 'Search Weeks', 'tamed-types' ),
    'parent_item_colon'  => __( 'Parent Weeks:', 'tamed-types' ),
    'not_found'          => __( 'No weeks found.', 'tamed-types' ),
    'not_found_in_trash' => __( 'No weeks found in Trash.', 'tamed-types' )
  );

  $args = array(
    'labels'              => $labels,
    'description'         => 'This post type consists of weeks',
    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'query_var'           => true,
    'capability_type'     => 'post',
    'has_archive'         => true,
    'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );

  register_post_type( $post_type, $args );
}
add_action('init','custom_type_week');
?>