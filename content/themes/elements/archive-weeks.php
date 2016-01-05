<?php
get_header();

// Build the query
$args = array(
  'post_type'       => 'weeks',
  'posts_per_page'  => 1
);
$query = new WP_Query( $args );

// Start the loop
if( $wp_query->have_posts() ):
  while( $wp_query->have_posts() ) : $wp_query->the_post();

    // Get the days in an array
    include('days.php');

    // Get week and dates
    $date_from = get_field( 'date_from' );
    $date_until = get_field( 'date_until' );

    echo
    '<div class="week-heading">
      <h1>' . get_the_title() . '<span class="is-grey"> ' . substr($date_from, 0, 5) . '–' . substr($date_until, 0, 5) . '</h1>
    </div>';

    // Loop through the days
    foreach( $days as $day ):
      if(! empty($day[1][0]['item_activity']) ):

        // Open the day and the table
        days_start($day);
          days_table_start();

            // Loop through activities
            $activities = $day[1];
            foreach( $activities as $activity ):
              days_single($activity);
            endforeach;

          days_table_end();
        days_end();

      endif;
    endforeach;

  endwhile;
endif;

get_footer();
?>