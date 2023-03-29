<?php get_header();?>

    <section class="bienvenida seccion contenedor text-center">
        <h2 class="texto-primario">
            <?php the_field('encabezado_bienvenida');?>

        </h2>
        <p><?php the_field('texto_bienvenida'); ?></p>
    </section>
    <section class='areas'>
       
        <div class="area">
            <?php
                $area1 = get_field('area_1');
                $imagen = $area1['imagen']['sizes']['medium_large'];
                $texto = $area1['texto'];
            ?>
            
            <img src="<?php echo esc_attr($imagen); ?>" alt="Imagen <?php echo esc_attr($texto); ?>">
            <p><?php echo esc_html($texto); ?></p>
        </div>
      
        <div class="area">
            <?php
                $area2 = get_field('area_2');
                $imagen2 = $area2['imagen']['sizes']['medium_large'];
                $texto = $area2['texto'];
            ?>
            
            <img src="<?php echo esc_attr($imagen2); ?>" alt="Imagen <?php echo esc_attr($texto); ?>">
            <p><?php echo esc_html($texto); ?></p>
        </div>

        <div class="area">
            <?php
                $area2 = get_field('area_3');
                $imagen2 = $area2['imagen']['sizes']['medium_large'];
                $texto = $area2['texto'];
            ?>
            
            <img src="<?php echo esc_attr($imagen2); ?>" alt="Imagen <?php echo esc_attr($texto); ?>">
            <p><?php echo esc_html($texto); ?></p>
        </div>
       
        <div class="area">
            <?php
                $area2 = get_field('area_4');
                $imagen2 = $area2['imagen']['sizes']['medium_large'];
                $texto = $area2['texto'];
            ?>
            
            <img src="<?php echo esc_attr($imagen2); ?>" alt="Imagen <?php echo esc_attr($texto); ?>">
            <p><?php echo esc_html($texto); ?></p>
        </div>

    </section>
    
            <main class="contenedor  seccion">
                <h2 class="text-center texto-primario">Nuestras Clases</h2>
                   <?php gymfitness_lista_clases(4);?>

                        <div class="contenedor-boton">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_title('Nuestras clases'))); ?>" 
                             class="boton boton-primario">
                                    Ver todas las clases
                            </a>
                        </div>

            </main>

            <section class="contenedor  seccion">
                <h2 class="text-center texto-primario">Nuestros Instructores</h2>
                <p class="text-center">Instructores profeccionales que te ayudaran a lograr tus objetivos</p>
                <?php gymfitness_instructores(); ?>

                </section>
                <section class="testimoniales">
                    <h2 class="text-center text-blanco">Testimoniales</h2>
                        <div class="conenedor-testimoniales swiper">
                    <?php gymfitness_testimoniales(); ?>

                        </div>                    
                </section>

                <section>
                 <h2 class="text-center texto-primario">Nuestro Blog</h2>
                 <p class="text-center">Aprende tips de nuestros instructores expertos</p>
                 <ul class="lista-clases">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4
                    );
                    $blog = new WP_Query($args);
                    while($blog->have_posts()){
                        $blog->the_post();
                       get_template_part('template-parts/blog');

                    }
                    wp_reset_postdata();
                    ?>

                 </ul>
                </section>
        <?php get_footer();?>
