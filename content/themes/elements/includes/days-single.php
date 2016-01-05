<?php
function days_single($activity) {
  $title = $activity['item_activity'];
  $project_ID = $activity['item_project'];
  $project = get_term_by('id', $project_ID, 'project');
  $project_name = $project->name;
  $project_url = get_term_link($project);

  echo
  '<tr>
    <td class="activity"><span>' . $title . '</span></td>
    <td class="project"><span><a href="' . $project_url . '">' . $project_name . '</a></span></td>
    <td class="hours"><span>8</span></td>
  </tr>';
}
?>