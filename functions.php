<?php

function register_menu_principal() {
  register_nav_menus(
    array(
      'menu-principal-izquierdo' => __( 'Menú Principal Izquierdo' ),
      'menu-principal-derecho' => __( 'Menú Principal Derecho' )
    )
  );
}
add_action( 'init', 'register_menu_principal' );



?>
