<?php
function days_start($day) {
  echo
  '<div class="activities day">
    <h2 class="is-bold">' . $day[0] . '</h2>';
}

function days_end() {
  echo '</div>';
}

function weeks_start() {
  echo '<div class="activities week">';
}

function weeks_end() {
  echo '</div>';
}

function year_start() {
  echo '<div class="activities year">';
}

function year_end() {
  echo '</div>';
}
?>