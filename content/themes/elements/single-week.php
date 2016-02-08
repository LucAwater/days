<?php
get_header();

// Build the query
$args = array(
  'post_type'       => 'weeks',
  'posts_per_page'  => 1
);
$query = new WP_Query( $args );

// Start the query loop
if( have_posts() ):
  while( have_posts() ): the_post();

    /*
     * Days
     */
    include('includes/days.php');

    // // Get week and dates
    // $date_from = get_field( 'date_from' );
    // $date_until = get_field( 'date_until' );
    //
    // echo
    // '<div class="page-heading">
    //   <h1>' . get_the_title() . '<span class="is-grey"> ' . substr($date_from, 0, 5) . '–' . substr($date_until, 0, 5) . '</h1>
    // </div>';

    // Loop through the days
    foreach( $days as $day ):
      days_single($day);
    endforeach;

    /*
     * Totals
     */
    $week_total = array();

    foreach( $days as $day ):
      $activities = $day[1];
      foreach( $activities as $activity ):
        $hours = $activity['item_hours'];
        array_push($week_total, $hours);
      endforeach;
    endforeach;

    echo '<div class="totals week">';
      $week_total = array_sum($week_total);
      if( $week_total < 1 ){
        echo '<p>No entries this week</p>';
      } else {
        echo '<p class="is-bold">Total hours this week: ' . $week_total . '</p>';
      }
    echo '</div>';

  endwhile;
endif;

get_footer();
?>