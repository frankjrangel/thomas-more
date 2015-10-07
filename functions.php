<?php
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


?>
