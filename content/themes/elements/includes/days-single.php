<?php
function days_single($day) {
  if(! empty($day[1][0]['item_activity']) ):

    // Open the day and the table
    days_start($day);
      days_table_start();

        // Loop through activities
        $activities = $day[1];
        foreach( $activities as $activity ):
          activities_single($activity);
        endforeach;

      days_table_end();
    days_end();

  endif;
}

function days_project_single($day, $project) {
  if(! empty($day[1][0]['item_activity']) ):

    // Loop through activities
    $activities = $day[1];
    foreach( $activities as $activity ):
      if( $activity['item_project'] == $project->term_id ){
        activities_single($activity);
      }
    endforeach;

  endif;
}

function days_type_single($day, $type) {
  if(! empty($day[1][0]['item_activity']) ):

    // Loop through activities
    $activities = $day[1];
    foreach( $activities as $activity ):
      if( $activity['item_type']->term_id == $type->term_id ){
        activities_single($activity);
      }
    endforeach;

  endif;
}
?>