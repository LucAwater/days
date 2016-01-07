<?php
get_header();

$type = get_term_by('slug', get_query_var('activity_type'), 'activity_type');

echo
'<div class="week-heading">
  <h1>' . $type->name . '</h1>
</div>';

echo '<pre>';
print_r($type);
echo '</pre>';

get_footer();
?>