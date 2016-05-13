<?php get_header(); ?>
<div id="front-welcome">
  <h1>CONVERTING UTOPIAS INTO REALITY</h1>
</div>
<div id="noticias" class="paneles ebook">

    <div class="descripcion-ebook">
        <h1>Sales Compensation Ebook</h1>

        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post() ?>
            <div>
                <div class="portada">
                    <?php the_post_thumbnail('small'); ?>
                    <?php if ( pll_current_language() == 'en' ) : ?>
                        <button class="boton-descarga">Download Intro</button>
                    <?php else: ?>
                        <button class="boton-descarga">Descargar Introducción</button>
                    <?php endif; ?>
                </div>
            <div class="formulario">

                <div id="errors"></div>

                <?php if ( pll_current_language() == 'en' ) : ?>
                    <h3>Fill out this form to download the introductory chapter</h3>
                    <form action="<?php echo get_template_directory_uri(); ?>/process_formulario_ebook.php" method="POST">
                        <div id="email-group" class="mc-field-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" data-parsley-required data-parsley-type="email">
                        </div>
                        <div id="name-group" class="mc-field-group">
                            <label for="name">First Name</label>
                            <input type="text" name="name">
                        </div>
                        <div id="lname-group" class="mc-field-group">
                            <label for="name">Last Name</label>
                            <input type="text" name="name">
                        </div>
                        <div id="company-group" class="mc-field-group">
                            <label for="company">Company</label>
                            <input type="text" name="company">
                        </div>
                        <div id="position-group" class="mc-field-group">
                            <label for="position">Position</label>
                            <input type="text" name="position">
                        </div>
                        <div id="checkbox-group" class="mc-field-group">
                            <input type="checkbox" name="subscribe" style="width:30px;" id="subscribe">
                            <label for="subscribe" style="width:70%">Subscribe to our newsletter</label>
                        </div>
                        <input type="submit" class="button" value="SUBMIT" />
                    </form>
                    <div style="clear:both;width:100%;"></div>

                <?php else: ?>

                    <h3>Llena este formulario para descargar el capitulo introductorio</h3>
                    <form action="<?php echo get_template_directory_uri(); ?>/process_formulario_ebook.php" method="POST">
                        <div id="email-group" class="mc-field-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" data-parsley-required data-parsley-type="email">
                        </div>
                        <div id="name-group" class="mc-field-group">
                            <label for="fname">Nombre</label>
                            <input type="text" name="fname">
                        </div>
                        <div id="lname-group" class="mc-field-group">
                            <label for="lname">Apellido</label>
                            <input type="text" name="lname">
                        </div>
                        <div id="company-group" class="mc-field-group">
                            <label for="company">Empresa</label>
                            <input type="text" name="company">
                        </div>
                        <div id="position-group" class="mc-field-group">
                            <label for="position">Cargo</label>
                            <input type="text" name="position">
                        </div>
                        <div id="checkbox-group" class="mc-field-group">
                            <input type="checkbox" name="subscribe" style="width:30px;" id="subscribe">
                            <label for="subscribe" style="width:70%">Subscribirse a nuestro newsletter</label>
                        </div>
                        <input type="submit" class="button" value="ENVIAR" />
                    </form>
                    <div style="clear:both;width:100%;"></div>

                <?php endif; ?>
            </div><!-- end #formulario -->
        </div>
        <div id="texto-descripcion">
            <?php the_content(); ?>
        </div>
        <?php endwhile; endif; ?>
    </div>
<div style="width:100%;clear:both;"></div>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/parsley.min.js"></script>
<?php if ( pll_current_language() == 'es' ) : ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/es.js"></script>
<?php endif; ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/formulario_ebook.js"></script>
<?php get_footer(); ?>
