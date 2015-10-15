<footer>
  <?php
    wp_nav_menu(
      array(
        'theme_location' => 'menu-principal-izquierdo',
        'container_class' => '',
        'container_id' => '',
        'menu_id' => '',
      )
    );

    wp_nav_menu( array( 'theme_location' => 'menu-principal-derecho' ) );
  ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
