<?php
get_header();

// Build the query
$args = array(
  'post_type'       => 'weeks',
  'posts_per_page'  => 1
);
$query = new WP_Query( $args );

// Start the query loop
if( $query->have_posts() ):
  while( $query->have_posts() ) : $query->the_post();

    // Get the days of looped week in an array
    include('includes/days.php');

    // Get week and dates
    $date_from = get_field( 'date_from' );
    $date_until = get_field( 'date_until' );

    echo
    '<div class="week-heading">
      <h1>' . get_the_title() . '<span class="is-grey"> ' . substr($date_from, 0, 5) . '–' . substr($date_until, 0, 5) . '</h1>
    </div>';

    // Loop through the days
    foreach( $days as $day ):
      days_single($day);
    endforeach;

  endwhile;
endif;

get_footer();
?>