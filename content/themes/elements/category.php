<?php
get_header();

$project_totals = array();

if( have_posts() ):

  $cat_ID = get_cat_ID( single_cat_title('', false) );
  $cat = get_the_category($cat_ID);

  echo '<h1>' . get_cat_name( $cat_ID ) . '</h1>';
  
  while( have_posts() ): the_post();

    echo '<div class="activities week">';
      echo '<h2>' . get_the_title() . '</h3>';

      echo '<ul>';
        // Get days
        include('days.php');

        // List entries per day
        foreach( $days as $day ):
          foreach( $day[1] as $single ):
            if( $single['item_project'] === $cat_ID ){
              echo '<li><p><span>' . $single['item_activity'] . '</span><span>' . get_cat_name( $single['item_project'] ) . '</span><span>' . $single['item_hours'] . '</span></p></li>';
            }
          endforeach;

        endforeach;
      echo '</ul>';

      // Get projects and hours in array per entry
      $projects = array();

      foreach( $days as $day ):
        foreach( $day[1] as $single ):
          array_push( $projects, array($single['item_project'], $single['item_hours']) );
        endforeach;
      endforeach;

      // Match keys with projects in entries
      ${"array" . $cat_ID} = array();

      foreach( $projects as $project ):
        if( $project[0] == $cat_ID ){
          array_push( ${"array" . $cat_ID}, $project[1] );
        }
      endforeach;

      // Echo totals
      $week_totals = array_sum( ${"array" . $cat_ID} );
      echo '<p class="is-bold">Subtotal: <span class="is-not-bold">' . $week_totals . '</span></p>';
    echo '</div>';

    $week_ID = get_the_ID();
    array_push( $project_totals, $week_totals );

  endwhile;
endif;

echo '<h2>Total: ' . array_sum( $project_totals ) . ' hours</h2>';

get_footer();
?>
