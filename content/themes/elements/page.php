<?php
get_header();

$mon_name = array( get_field('monday') );
$mon_items = array( get_field('monday_item') );
$monday = array_merge( $mon_name, $mon_items );

$tue_name = array( get_field('tuesday') );
$tue_items = array( get_field('tuesday_item') );
$tuesday = array_merge( $tue_name, $tue_items );

$wed_name = array( get_field('wednesday') );
$wed_items = array( get_field('wednesday_item') );
$wednesday = array_merge( $wed_name, $wed_items );

$thu_name = array( get_field('thursday') );
$thu_items = array( get_field('thursday_item') );
$thursday = array_merge( $thu_name, $thu_items );

$fri_name = array( get_field('friday') );
$fri_items = array( get_field('friday_item') );
$friday = array_merge( $fri_name, $fri_items );

$sat_name = array( get_field('saturday') );
$sat_items = array( get_field('saturday_item') );
$saturday = array_merge( $sat_name, $sat_items );

$sun_name = array( get_field('sunday') );
$sun_items = array( get_field('sunday_item') );
$sunday = array_merge( $sun_name, $sun_items );

$days = array( $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday );

// List entries per day
foreach( $days as $day ):
  echo '<div class="day">';
    echo '<h2 class="is-bold">' . $day[0] . '</h2>';

    echo '<ul>';
      foreach( $day[1] as $single ):
        echo '<li><p><span>' . $single['item_activity'] . '</span><span>' . get_cat_name( $single['item_project'] ) . '</span><span>' . $single['item_hours'] . '</span></p></li>';
      endforeach;
    echo '</ul>';
  echo '</div>';
endforeach;

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
foreach( $keys as $key ):
  echo '<p class="is-bold">' . get_cat_name($key) . ': <span class="is-not-bold">' . array_sum(${"array" . $key}) . '</span></p>';
endforeach;

get_footer();
?>
