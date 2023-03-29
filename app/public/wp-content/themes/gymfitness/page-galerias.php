/*
* Template Name: Template para Galerias
*/
<?php get_header();?>
<main class="contenedor pagina seccion">
    <div class="contenido-principal">
              
             
                  <?php 
                  while( have_posts() ): the_post() ; ?>
                        <h1 class="text-center texto-primario"><?php the_title(); ?></h1>
                        <?php // obtener la galeria de la página actual
                            $galeria = get_post_gallery (get_the_ID(), false );
                                // obtener los ids
                            $galeria_imagenes_ID = explode(',', $galeria ['ids']);
                            
                    ?>
                    <ul class="galeria-imagenes">
                                <?php
                                foreach($galeria_imagenes_ID as $id){
                                    $imagenGrande = wp_get_attachment_image_src($id,'large')[0];
                                    $imagenFull = wp_get_attachment_image_src($id,'large')[0];/**o full donde esta large*/
                                  ?>
                                  <li>
                                    <a data-lightbox="galaria" href=" <?php echo $imagenFull;?>">
                                        <img src="<?php echo $imagenGrande; ?>" alt="
                                        Imagen galeria">
                                    </a>
                                  </li>
                                  
                                    <?php

                                }
                                ?>

                                </ul>
                                          
                <?php endwhile; ?>

    </div>             
</main>

<?php get_footer();?>