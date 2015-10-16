<footer>
  <div id="contenido-footer">
    <nav>
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
    </nav>
    <div id="redes-footer">
      <div class="redes">
        <a class="red" target="_blank" href="https://www.linkedin.com/company/thomas-more-management-consulting?trk=biz-companies-cym"></a>
        <a class="red" target="_blank" href="https://www.facebook.com/thomasmoremc"></a>
        <a class="red" target="_blank" href="https://twitter.com/ThomasMoreMC"></a>
      </div>
    </div>
  </div>
  <div id="copy-footer">
    <?php
      if ( pll_current_language() == 'en' )
        $copy = ' by Thomas More Consulting Group. All rights reserved.';
      else
        $copy = ' Thomas More Consulting Group. Todos los derechos reservados.';
    ?>
    &copy; <?php echo date("Y"); echo $copy; ?>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
