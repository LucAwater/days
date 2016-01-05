<?php
$post_type = 'weeks';

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


//create a function that will attach our new 'member' taxonomy to the 'post' post type
function custom_tax_project(){

   //set the name of the taxonomy
   $taxonomy = 'project';
   //set the post types for the taxonomy
   $object_type = 'weeks';

   //populate our array of names for our taxonomy
   $labels = array(
       'name'               => 'Projects',
       'singular_name'      => 'Project',
       'search_items'       => 'Search Projects',
       'all_items'          => 'All Projects',
       'parent_item'        => 'Parent Project',
       'parent_item_colon'  => 'Parent Project:',
       'update_item'        => 'Update Project',
       'edit_item'          => 'Edit Project',
       'add_new_item'       => 'Add New Project',
       'new_item_name'      => 'New Project Name',
       'menu_name'          => 'Projects'
   );

   //define arguments to be used
   $args = array(
       'labels'            => $labels,
       'hierarchical'      => true,
       'show_ui'           => true,
       'how_in_nav_menus'  => true,
       'public'            => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array('slug' => 'project')
   );

   //call the register_taxonomy function
   register_taxonomy($taxonomy, $object_type, $args);
}
add_action('init','custom_tax_project');

?>