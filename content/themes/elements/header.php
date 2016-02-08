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
      <?php
      $clients = get_terms('client', 'hide_empty=0');
      $projects = get_terms('project', 'hide_empty=0');
      $weeks = new WP_Query( array('post_type' => 'weeks') );
      // [term_id] => 61
      // [name] => Envato
      // [slug] => envato
      // [term_group] => 0
      // [term_taxonomy_id] => 61
      // [taxonomy] => client
      // [description] =>
      // [parent] => 0
      // [count] => 0
      ?>
      <div id="filter">
        <?php if( $clients ): ?>
          <ul id="filter-client">
            <p class="is-grey">Clients</p>
            <?php foreach( $clients as $client ): ?>
              <li>
                <a href="<?php echo home_url() . '/client/' . $client->slug; ?>"><?php echo $client->name; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <?php if( $projects ): ?>
          <ul id="filter-project">
            <p class="is-grey">Projects</p>
            <?php foreach( $projects as $project ): ?>
              <li>
                <a href="<?php echo home_url() . '/project/' . $project->slug; ?>"><?php echo $project->name; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <?php if( $weeks->have_posts() ): ?>
          <ul id="filter-week">
            <?php while( $weeks->have_posts() ): $weeks->the_post(); ?>
              <li>
                <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
              </li>
            <?php endwhile; ?>
          </ul>
        <?php wp_reset_postdata(); endif; ?>
      </div>
