<?php
function days_table_start() {
  echo
  '<table>
    <colgroup>
      <col class="activity">
      <col class="project">
      <col class="client">
      <col class="type">
      <col class="hours">
    </colgroup>

    <thead>
      <tr>
        <th><span>Activity</span></th>
        <th><span>Project</span></th>
        <th><span>Client</span></th>
        <th><span>Type</span></th>
        <th><span>Hours</span></th>
      </tr>
    </thead>';
}

function days_table_end() {
  echo
  '</table>';
}
?>