<?php
add_theme_support('post-thumbnails');

function remove_menus() {
  remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menus' );

function register_menu_principal() {
  register_nav_menus(
    array(
      'menu-principal-izquierdo' => __( 'Menú Principal Izquierdo' ),
      'menu-principal-derecho' => __( 'Menú Principal Derecho' )
    )
  );
}
add_action( 'init', 'register_menu_principal' );

function tm_valores() {
  $labels = array(
    'name' => 'Valores',
    'singular_name' => 'Valor',
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
  );

  register_post_type( 'valores', $args );
}
add_action( 'init', 'tm_valores' );

function tm_equipo() {
  $labels = array(
    'name' => 'Equipo',
    'singular_name' => 'Miembro',
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'supports' => array( 'title', 'editor', 'thumbnail'),
  );

  register_post_type( 'equipo', $args );
}
add_action( 'init', 'tm_equipo' );

function tm_productos_servicios() {
  $labels = array(
    'name' => 'Productos y Servicios',
    'singular_name' => 'Producto/Servicio',
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
  );

  register_post_type( 'productosyservicios', $args );
}
add_action( 'init', 'tm_productos_servicios' );

add_filter('pll_get_post_types', 'my_pll_get_post_types');
function my_pll_get_post_types($types) {
  return array_merge($types,
    array(
      'valores' => 'valores',
      'equipo' => 'equipo',
      'productosyservicios' => 'productosyservicios',
    )
  );
}

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
add_action( 'loop_start', 'jptweak_remove_share' );

?>
