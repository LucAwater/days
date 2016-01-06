<?php
get_header();

$project = get_term_by('slug', get_query_var('project'), 'project');

echo
'<div class="week-heading">
  <h1>' . $project->name . '</h1>
</div>';

echo '<pre>';
print_r($project);
echo '</pre>';



get_footer();
?>