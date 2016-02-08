<?php
/*
 * Taxonomy: Client
 * Post type: weeks
 */
function custom_tax_client(){

   //set the name of the taxonomy
   $taxonomy = 'client';
   //set the post types for the taxonomy
   $object_type = 'weeks';

   //populate our array of names for our taxonomy
   $labels = array(
       'name'               => 'Clients',
       'singular_name'      => 'Client',
       'search_items'       => 'Search Clients',
       'all_items'          => 'All Clients',
       'parent_item'        => 'Parent Client',
       'parent_item_colon'  => 'Parent Client:',
       'update_item'        => 'Update Client',
       'edit_item'          => 'Edit Client',
       'add_new_item'       => 'Add New Client',
       'new_item_name'      => 'New Client Name',
       'menu_name'          => 'Clients'
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
       'rewrite'           => array('slug' => 'client')
   );

   //call the register_taxonomy function
   register_taxonomy($taxonomy, $object_type, $args);
}
add_action('init','custom_tax_client');

/*
 * Taxonomy: Project
 * Post type: weeks
 */
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

/*
 * Taxonomy: Activity Type
 * Post type: weeks
 */
function custom_tax_activity_type(){

   //set the name of the taxonomy
   $taxonomy = 'activity_type';
   //set the post types for the taxonomy
   $object_type = 'weeks';

   //populate our array of names for our taxonomy
   $labels = array(
       'name'               => 'Activity Types',
       'singular_name'      => 'Activity Type',
       'search_items'       => 'Search Types',
       'all_items'          => 'All Types',
       'parent_item'        => 'Parent Type',
       'parent_item_colon'  => 'Parent Type:',
       'update_item'        => 'Update Type',
       'edit_item'          => 'Edit Type',
       'add_new_item'       => 'Add New Type',
       'new_item_name'      => 'New Type Name',
       'menu_name'          => 'Activity Types'
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
       'rewrite'           => array('slug' => 'activity_type')
   );

   //call the register_taxonomy function
   register_taxonomy($taxonomy, $object_type, $args);
}
add_action('init','custom_tax_activity_type');
?>