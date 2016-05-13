<?php get_header(); ?>
<div id="front-welcome">
  <h1>CONVERTING UTOPIAS INTO REALITY</h1>
</div>
<style>
  #mc_embed_signup_scroll
  {
    margin:40px 0;
    padding-bottom:20px;
    max-width:500px;
  }
  #noticias #feed-noticias{
    width: 100%;
    max-width: 1000px;
  }

  #noticias #feed-noticias a{
    border:none;
  }
  img.aligncenter{
    margin:auto;
    display:block;
  }
</style>
<div id="noticias" class="paneles">
  <div id="feed-noticias">
    <h1 class="titulo-seccion">
      <?php the_title(); ?>
    </h1>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="noticias-item">
          <?php if ( has_post_thumbnail() )
            the_post_thumbnail('medium'); ?>
          <p><?php the_content(); ?></p>
          <?php if ( get_field('link-externo') ) : ?>
            <a href="<?php the_field('link-externo'); ?>" target="_blank">
              <?php
                if ( pll_current_language() == 'en' )
                  $titulo = 'READ MORE';
                else
                  $titulo = 'LEER MÁS';
                echo $titulo;
              ?>
            </a>
          <?php endif; ?>
          <?php if ( function_exists( 'sharing_display' ) ) {
              sharing_display( '', true );
            }
          ?>
          
        </div>
    <?php endwhile; endif; ?>
  </div>
</div>

<?php get_footer(); ?>
0
