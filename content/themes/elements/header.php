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

  <!-- Fonts form Typekit -->
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

<body class="is-loading">
  <!-- Header -->
  <aside>
    <div>
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo-inversed.svg">
    </div>

    <?php include('includes/nav.php'); ?>

    <input type="button" onclick="printDiv('main')" value="print current week" />
  </aside>

  <!-- Main content -->
  <main role="main" id="main">
