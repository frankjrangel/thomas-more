<!DOCTYPE html>
<html lang="es">
<head>
  <title>Thomas More</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300">
  <link rel="shortcut icon" href="<?php echo get_site_url(); ?>/favicon.ico" />
  <?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
</head>

<body>
<header>
<?php if ( ! is_page( 'sales-compensation' ) ) : ?>
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

<?php else: ?>

<div id="header-menu-container">
  <div class="menu-main-left-container"><ul id="menu-main-left" class="menu"><li id="menu-item-28" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-10 current_page_item menu-item-28"><a href="http://tmmcinc.com/en/">HOME</a></li>
<li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-29"><a href="http://tmmcinc.com/en/#nosotros">ABOUT US</a></li>
<li id="menu-item-30" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-30"><a href="http://tmmcinc.com/en/#servicios">SERVICES</a></li>
</ul></div>
  <a href="http://tmmcinc.com/en/">
    <div id="logo-header"></div>
  </a>

  <div class="menu-main-right-container"><ul id="menu-main-right" class="menu"><li id="menu-item-31" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31"><a href="http://tmmcinc.com/en/news/">NEWS</a></li>
<li id="menu-item-32" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-32"><a href="http://tmmcinc.com/en/#mapa">FIND US</a></li>
</ul></div>
  <div id="redes-header">
    <div class="lang">
      	<li class="lang-item lang-item-11 lang-item-es"><a hreflang="es-ES" href="http://tmmcinc.com/">es</a></li>
	<li class="lang-item lang-item-14 lang-item-en current-lang"><a hreflang="en-US" href="http://tmmcinc.com/en/">en</a></li>
    </div>
    <div class="redes">
      <a class="red" target="_blank" href="https://www.linkedin.com/company/thomas-more-management-consulting?trk=biz-companies-cym"></a>
      <a class="red" target="_blank" href="https://www.facebook.com/thomasmoremc"></a>
      <a class="red" target="_blank" href="https://twitter.com/ThomasMoreMC"></a>
    </div>
  </div>
</div>
<?php endif; ?>
</header>
