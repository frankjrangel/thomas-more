<!DOCTYPE html>
<html lang="es">
<head>
  <title>Thomas More</title>
  <meta name="viewport" content"width=device-with, initial-scale=1">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300">
  <link rel="shortcut icon" href="<?php echo get_template_directory(); ?>/favicon.ico" />
  <?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
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
    <div class="lang">
      <?php pll_the_languages(array( 'display_names_as' => 'slug' )); ?>
    </div>
    <div class="redes">
      <a class="red" target="_blank" href="https://www.linkedin.com/company/thomas-more-management-consulting?trk=biz-companies-cym"></a>
      <a class="red" target="_blank" href="https://www.facebook.com/thomasmoremc"></a>
      <a class="red" target="_blank" href="https://twitter.com/ThomasMoreMC"></a>
    </div>
  </div>
</div>
</header>
