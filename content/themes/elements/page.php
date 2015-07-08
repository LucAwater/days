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

$days = array( $monday, $tuesday, $wednesday, $thursday, $friday );

// echo '<pre>';
// print_r($days);
// echo '</pre>';

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

get_footer();
?>
