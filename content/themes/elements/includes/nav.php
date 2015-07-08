<?php
// The Query
query_posts( 'posts_per_page=-1' );

echo
'<nav>
  <ul>';

    // The Loop
    while ( have_posts() ) : the_post();
        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
    endwhile;

  echo
  '</ul>
</nav>';

// Reset Query
wp_reset_query();
?>
