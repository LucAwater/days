<?php
get_header();

// Build the query
$args = array(
  'post_type'       => 'weeks',
  'posts_per_page'  => -1,
  'order'           => 'ASC'
);
$query = new WP_Query( $args );

// Start the query loop
if( $query->have_posts() ):

  $year_total = array();

  year_start();
    while( $query->have_posts() ) : $query->the_post();
      /*
       * Days
       */
      include('includes/days.php');

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

      $week_total = array_sum($week_total);

      echo '<a href="' . get_permalink() . '"><h2>' . get_the_title() . ': ' . $week_total . ' hours</h2></a>';


      array_push($year_total, $week_total);
    endwhile;

    $year_total = array_sum($year_total);

    echo '<h2 class="is-bold">Total hours this year: ' . $year_total . '</h2>';
  year_end();
endif;

get_footer();
?>