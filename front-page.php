<?php get_header(); ?>
<div id="front-welcome">
</div>
<div id="nosotros" class="paneles">
  
  <?php // ES 

  if ( get_field( 'nosotros' ) ) :

    $nosotros = get_field_object('nosotros');
    $titulo_nosotros = $nosotros['label'];
    $texto_nosotros = $nosotros['value'];

  //EN
    
  elseif ( get_field( 'about_us' ) ) :

    $nosotros = get_field_object('about_us');
    $titulo_nosotros = $nosotros['label'];
    $texto_nosotros = $nosotros['value'];
  
  endif; ?>

  <h1 class="titulo-seccion"><?php echo $titulo_nosotros; ?></h1>
  <div class="texto-seccion"><?php echo $texto_nosotros; ?></div>

</div>
<span class="separador"></span>
<div id="que-hacemos" class="paneles">
  <h2 id="titulo-que-hacemos" class="subtitulo-seccion">
    <?php //ES 

    if ( get_field( 'que-hacemos' ) ) :

      $que_hacemos = get_field_object('que-hacemos');
      $titulo_que_hacemos = $que_hacemos['label'];
      $texto_que_hacemos = $que_hacemos['value'];
  
    elseif ( get_field( 'what-we-do' ) ) :

      $nosotros = get_field_object('about_us');
      $titulo_nosotros = $nosotros['label'];
      $texto_nosotros = $nosotros['value'];
       
    endif;  
    echo $titulo_que_hacemos; ?>
  </h2>
  <div id="contenido-que-hacemos" class="texto-seccion">
    <div class="filtro"> 
      <span class="flecha"></span>
      <?php echo $texto_que_hacemos; ?>
    </div>
  </div>
  <span class="separador"></span>
<div>
<div id="nuestros-valores" class="paneles">
  <h2 id="titulo-nuestros-valores" class="subtitulo-seccion">
    <?php
      if ( pll_current_language() == 'en' )
        $titulo = 'OUR VALUES';
      else 
        $titulo = 'NUESTROS VALORES';
      
      echo $titulo;
    ?>  
  </h2>
  <div id="contenido-nuestros-valores">
  <div class="flecha"></div>
    <?php
      $query = new WP_Query( array( 'post_type' => 'valores' ) );  

      if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();  
    ?>
      <div class="valores-item">
        <?php if ( get_field( 'icono-valores' ) ) : ?> 
             
          <img src="<?php the_field( 'icono-valores' ); ?>" /> 
            
        <?php endif; ?> 
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
      </div>
    <?php endwhile; endif; wp_reset_query(); ?>
  </div>
</div>
<div id="equipo" class="paneles">
  <span class="separador"></span>
  <h2>
    <?php
      if ( pll_current_language() == 'en' )
        $titulo = 'OUR TEAM';
      else 
        $titulo = 'NUESTRO EQUIPO';
      
      echo $titulo;
    ?>  
  </h2>
  <?php
    $query = new WP_Query( array( 'post_type' => 'equipo' ) );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
  ?>
    <div class="equipo-item">
      <?php if ( has_post_thumbnail() )
      the_post_thumbnail('medium'); ?> 
      <h3><?php the_title(); ?></h3>
      <h4><?php the_field('cargo'); ?></h4>
      <p><?php the_content(); ?></p>
    </div>
  <?php endwhile; endif; wp_reset_query(); ?> 
</div>
<div id="servicios" class="paneles">

</div>
<div id="noticias" class="paneles">

</div>
<div id="ubicanos" class="paneles">

</div>
<?php get_footer(); ?>
