<?php
function activities_single($activity) {
  $title = $activity['item_activity'];
  ( $title ) ? $title = $title : $title = '–';

  $project_ID = $activity['item_project'];
  ( $project_ID ) ? $project = get_term_by('id', $project_ID, 'project') : $project = '';
  ( $project_ID ) ? $project_url = get_term_link($project) : $project = '';
  ( $project_ID ) ? $project_name = $project->name : $project = '–';

  $client = get_field( 'project_client', $project );
  ( $client ) ? $client_url = home_url() . '/clients/' . $client->slug : $client_url = '';
  ( $client ) ? $client_name = $client->name : $client_name = '–';

  $type = $activity['item_type'];
  ( $type ) ? $type_url = get_term_link($type) : $type_url = '';
  ( $type ) ? $type_name = $type->name : $type_name = '–';

  $hours = $activity['item_hours'];
  ( $hours ) ? $hours = $hours : $hours = '0';

  echo
  '<tr>
    <td class="activity"><span>' . $title . '</span></td>
    <td class="project"><span><a href="' . $project_url . '">' . $project_name . '</a></span></td>
    <td class="client"><span><a href="' . $client_url . '">' . $client_name . '</a></span></td>
    <td class="type"><span><a href="' . $type_url . '">' . $type_name . '</a></span></td>
    <td class="hours"><span>' . $hours . '</span></td>
  </tr>';
}
?>