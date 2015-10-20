<?php get_header(); ?>
<div id="front-welcome">
  <h1>CONVERTING UTOPIAS INTO REALITY</h1>
</div>
<div id="noticias" class="paneles">
  <div id="formulario-suscripcion">
    <?php if( function_exists( 'ninja_forms_display_form' ) )
          {
            if ( pll_current_language() == 'en' )
              ninja_forms_display_form( 5 );
            else
              ninja_forms_display_form( 6 );
          }
    ?>
  </div>
  <div id="feed-noticias">
    <h1 class="titulo-seccion">
      <?php
        if ( pll_current_language() == 'en' )
          $titulo = 'NEWS';
        else
          $titulo = 'NOTICIAS';

        echo $titulo;
      ?>
    </h1>
    <?php
      $query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 2 ) );
      if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
        <div class="noticias-item">
          <?php if ( has_post_thumbnail() )
            the_post_thumbnail('medium'); ?>
          <h3><?php the_title(); ?></h3>
          <p><?php the_excerpt(); ?></p>
          <a href="<?php
            if ( get_field('link-externo') )
            {
              the_field('link-externo');
            }
            else
            {
              the_permalink();
            }
          ?>"
          <?php
            if ( get_field('link-externo') )
              { echo 'target="_blank"'; }
          ?>>
          <?php
            if ( pll_current_language() == 'en' )
              $titulo = 'READ MORE';
            else
              $titulo = 'LEER MÁS';

            echo $titulo;
          ?>
          </a>
          <?php if ( function_exists( 'sharing_display' ) ) {
              sharing_display( '', true );
            }
          ?>
        </div>
    <?php endwhile; endif; wp_reset_query(); ?>
  </div>
</div>

<?php get_footer(); ?>
