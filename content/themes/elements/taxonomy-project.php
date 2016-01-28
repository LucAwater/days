<?php
get_header();

$project = get_term_by('slug', get_query_var('project'), 'project');

echo
'<div class="page-heading">
  <h1>' . $project->name . '</h1>
</div>';

// Build the query
$args = array(
  'post_type'       => 'weeks',
  'posts_per_page'  => -1
);
$query = new WP_Query( $args );

// Start the query loop
if( $query->have_posts() ):
  while( $query->have_posts() ) : $query->the_post();

    /*
     * Days
     */
    include('includes/days.php');

    // Get week and dates
    $date_from = get_field( 'date_from' );
    $date_until = get_field( 'date_until' );

    // Loop through the days
    // Open the week and the table
    weeks_start();
      echo '<h2 class="is-bold">' . get_the_title() . '<span> ' . substr($date_from, 0, 5) . '–' . substr($date_until, 0, 5) . '</h2>';

      days_table_start();

        foreach( $days as $day ):
          days_project_single($day, $project);
        endforeach;

      days_table_end();
    weeks_end();

  endwhile;
endif;

get_footer();
?>