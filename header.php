<!DOCTYPE html>
<html>
<head>
  <title>Thomas More</title>
  <meta name="viewport" content"width=device-with, initial-scale=1">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300">
</head>

<body>
<header>
<div id="header-menu-container">
  <?php 
    wp_nav_menu( 
      array( 
        'theme_location' => 'menu-principal-izquierdo',
        'container_class' => '',
        'container_id' => '',
        'menu_id' => '',
      ) 
    );
  ?>
  
  <a href="<?php echo esc_url( home_url('/') ); ?>">
    <div id="logo-header"></div>
  </a>

  <?php 
    wp_nav_menu( array( 'theme_location' => 'menu-principal-derecho' ) ); 
  ?>

  <div id="redes-header">
    <?php pll_the_languages(array( 'display_names_as' => 'slug' )); ?>
  </div>
</div>
