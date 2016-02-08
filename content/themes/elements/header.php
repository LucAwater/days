<?php
/**
 * @package WordPress
 */
?>

<!DOCTYPE html>
<!--[if IE 9]>    <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <title>Days</title>

  <link rel="canonical" href="<?php echo home_url(); ?>">

  <!-- META TAGS -->
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="description" content="">

  <meta property="og:title" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print.css" media="print">

  <!-- Fonts from Typekit -->
  <script src="//use.typekit.net/bux1knv.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>

  <!-- WP_HEAD() -->
  <?php wp_head(); ?>

  <script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
   }
  </script>
</head>

<body>
  <!-- Main content -->
  <main id="main" role="main">
    <div class="content">
      <!-- Filter -->
      <?php
      $clients = get_terms('client', 'hide_empty=0');
      $projects = get_terms('project', 'hide_empty=0');
      $weeks = new WP_Query( array('post_type' => 'weeks') );
      ?>
      <div id="filter">
        <!-- Clients -->
        <?php if( $clients ): ?>
          <ul id="filter-client">
            <p class="is-grey">Select client</p>

            <?php
            if( !is_tax('client') ):
              echo '<li class="current"><a>All</a></li>';

              foreach( $clients as $client ):
                echo '<li><a href="' . home_url() . '/client/' . $client->slug . '">' . $client->name . '</a></li>';
              endforeach;
            else:
              $client_current = get_query_var('client');

              echo '<li><a>All</a></li>';

              foreach( $clients as $client ):
                if( $client_current === $client->slug ){
                  echo '<li class="current"><a href="' . home_url() . '/client/' . $client->slug . '">' . $client->name . '</a></li>';
                } else {
                  echo '<li><a href="' . home_url() . '/client/' . $client->slug . '">' . $client->name . '</a></li>';
                }
              endforeach;
            endif;
            ?>
          </ul>
        <?php endif; ?>

        <!-- Projects -->
        <?php if( $projects ): ?>
          <ul id="filter-project">
            <p class="is-grey">Select project</p>

            <?php
            if( !is_tax('project') ):
              echo '<li class="current"><a>All</a></li>';

              foreach( $projects as $project ):
                echo '<li><a href="' . home_url() . '/project/' . $project->slug . '">' . $project->name . '</a></li>';
              endforeach;
            else:
              $project_current = get_query_var('project');

              echo '<li><a>All</a></li>';

              foreach( $projects as $project ):
                if( $project_current === $project->slug ){
                  echo '<li class="current"><a href="' . home_url() . '/project/' . $project->slug . '">' . $project->name . '</a></li>';
                } else {
                  echo '<li><a href="' . home_url() . '/project/' . $project->slug . '">' . $project->name . '</a></li>';
                }
              endforeach;
            endif;
            ?>
          </ul>
        <?php endif; ?>

        <!-- Weeks -->
        <?php
        if( $weeks->have_posts() ):
          $year = '';
          ?>
          <div id="filter-week">
            <p class="is-grey">Select week</p>

            <select>
              <option value="all">All</option>

              <?php
              while( $weeks->have_posts() ): $weeks->the_post();
                $date_from = get_field( 'date_from' );
                $date_until = get_field( 'date_until' );

                $year_from = substr($date_from, -4);
                $year_until = substr($date_until, -4);

                if( $year != $year_from ):
                  echo '</optgroup>';
                  echo '<optgroup label="' . $year_from . '">';
                    echo '<option value="' . basename( get_permalink() ) . '">' . get_the_title() . '</option>';
                else:
                  echo '<option value="' . basename( get_permalink() ) . '">' . get_the_title() . '</option>';
                endif;

                $year = $year_from;
              endwhile; ?>
            </select>

            <p id="selected-date"><?php echo get_field( 'date_from' ) . ' – ' . get_field( 'date_until' ); ?></p>
          </div>
        <?php wp_reset_postdata(); endif; ?>
      </div>
