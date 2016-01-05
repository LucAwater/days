<?php
  echo
  '<tr>
    <td class="activity"><span>' . $single['item_activity'] . '</span></td>
    <td class="project"><span><a href="' . get_category_link( $single['item_project'] ) . '">' . get_cat_name( $single['item_project'] ) . '</a></span></td>
    <td class="hours"><span>' . $single['item_hours'] . '</span></td>
  </tr>';
?>