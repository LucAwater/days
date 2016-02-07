<?php
get_header();

// Get week and dates
$date_from = get_field( 'date_from' );
$date_until = get_field( 'date_until' );

echo '<h1 style="font-size:2em">' . get_the_title() . '<span style="font-size:.6em" class="is-grey"> ' . substr($date_from, 0, 10) . ' – ' . substr($date_until, 0, 10) . '</h1>';

/*
 * Days table
 */
include_once('days.php');

foreach( $days as $day ):
  if( !empty($day[1][0]['item_activity']) ):
    // Open the table
    include('table-start.php');

    // Loop through activities
    echo '<tbody>';
      foreach( $day[1] as $single ):
        include('days-single.php');
      endforeach;
    echo '</tbody>';

    // Close the table
    include('table-end.php');
  else:
    // Do nothing
  endif;
endforeach;

/*
 * Totals per project and overall
 */

// Get projects and hours in array per entry
$projects = array();

foreach( $days as $day ):
  foreach( $day[1] as $single ):
    array_push( $projects, array($single['item_project'], $single['item_hours']) );
  endforeach;
endforeach;

// Get projects as keys
$keys = array();
foreach( $projects as $project ):
  array_push( $keys, $project[0] );
endforeach;
$keys = array_filter( array_unique($keys) );

// Match keys with projects in entries
foreach( $keys as $key ):
  ${"array" . $key} = array();

  foreach( $projects as $project ):
    if( $project[0] == $key ){
      array_push( ${"array" . $key}, $project[1] );
    }
  endforeach;
endforeach;

// Echo totals
echo '<div class="totals week">';
  $week_total = array();

  foreach( $keys as $key ):
    $project_total = array_sum( ${"array" . $key} );
    array_push( $week_total, $project_total );

    echo '<p>' . get_cat_name( $key ) . ': <span class="is-not-bold">' . $project_total . '</span></p>';
  endforeach;

  $week_total = array_sum($week_total);
  if( $week_total === 0 ){
    echo '<p>No entries this week</p>';
  } else {
    echo '<p class="is-bold">Total hours this week: ' . $week_total . '</p>';
  }
echo '</div>';

get_footer();
?>
