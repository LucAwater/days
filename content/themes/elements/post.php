<?php
get_header();

// Get week and dates
$date_from = get_field( 'date_from' );
$date_until = get_field( 'date_until' );

echo '<h1>' . get_the_title() . '<span class="is-grey"> ' . substr($date_from, 0, 5) . '–' . substr($date_until, 0, 5) . '</h1>';

// Get days
include('days.php');

// List entries per day
foreach( $days as $day ):
  echo '<div class="activities day">';
    echo '<h2 class="is-bold">' . $day[0] . '</h2>';

    echo
    '<table>
      <colgroup>
        <col class="activity">
        <col class="project">
        <col class="hours">
      </colgroup>

      <thead>
        <tr>
          <th><span>Activity</span></th>
          <th><span>Project</span></th>
          <th><span>Hours</span></th>
        </tr>
      </thead>

      <tbody>';
        foreach( $day[1] as $single ):
          echo
          '<tr>
            <td class="activity"><span>' . $single['item_activity'] . '</span></td>
            <td class="project"><span><a href="' . get_category_link( $single['item_project'] ) . '">' . get_cat_name( $single['item_project'] ) . '</a></span></td>
            <td class="hours"><span>' . $single['item_hours'] . '</span></td>
          </tr>';
        endforeach;
      echo '</tbody>';
    echo '</table>';
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
$week_total = array();

foreach( $keys as $key ):
  $project_total = array_sum( ${"array" . $key} );
  array_push( $week_total, $project_total );

  echo '<p class="is-bold">' . get_cat_name( $key ) . ': <span class="is-not-bold">' . $project_total . '</span></p>';
endforeach;

echo '<p>Total hours this week: ' . array_sum( $week_total ) . '</p>';

get_footer();
?>
