<?php
// The Query
query_posts( 'posts_per_page=-1' );

echo
'<nav>
  <ul>';

    $current = get_the_title();
    
    // The Loop
    while ( have_posts() ) : the_post();
      if( $current === get_the_title() ):
        echo '<li class="current"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
      else:
        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
      endif;
    endwhile;

  echo
  '</ul>
</nav>';

// Reset Query
wp_reset_query();
?>
