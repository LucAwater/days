<?php
function activities_single($activity) {
  $title = $activity['item_activity'];

  $project_ID = $activity['item_project'];
  $project = get_term_by('id', $project_ID, 'project');
  $project_name = $project->name;
  $project_url = get_term_link($project);

  $type = $activity['item_type'];
  $type_name = $type->name;
  $type_url = get_term_link($type);

  $hours = $activity['item_hours'];

  echo
  '<tr>
    <td class="activity"><span>' . $title . '</span></td>
    <td class="project"><span><a href="' . $project_url . '">' . $project_name . '</a></span></td>
    <td class="type"><span><a href="' . $type_url . '">' . $type_name . '</a></span></td>
    <td class="hours"><span>' . $hours . '</span></td>
  </tr>';
}
?>