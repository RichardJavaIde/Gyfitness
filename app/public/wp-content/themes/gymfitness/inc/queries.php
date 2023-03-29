<?php
function gymfitness_lista_clases($cantidad =-1){?>
    <ul class="lista-clases">
<?php
        $args = array(
               'post_type' =>'clases',
               'posts_per_page' => $cantidad
);
              $clases = new WP_Query ($args) ;
              While ($clases->have_posts() ): $clases ->the_post () ; ?>
               <Li class="clase card gradient"> 
               <?php the_post_thumbnail('cajas');?> 
               <div class="contenido">
                <a href="<?php the_permalink()?>">
                <h3><?php the_title();?></h3>
                 </a>
                 <?php
                 $hora_inicio = get_field('hora_inicio');
                 $hora_fin = get_field('hora_fin');

                 ?>
                 <p><?php the_field('dias_clase');?>, de <?php echo $hora_inicio." a ". $hora_fin?></p>
              
               </div>
              </Li>
              <?php endwhile; wp_reset_postdata(); ?>
</ul>
<?php
}
function gymfitness_instructores(){
?>
<ul class="lista-clases instructores">
<?php
        $args = array(
               'post_type' =>'instructores',
              );
              $instructores = new WP_Query ($args) ;
              While ($instructores->have_posts() ):
               $instructores ->the_post () ; ?>
               <Li class="instructor"> 
                  <?php the_post_thumbnail('cajas');?>
                    <div class="contenido text-center">
                      <h3><?php the_title();?></h3>
                      <?php the_content(); ?>

                      <div class="especialidad">
                        <?php 
                        $esp = get_field('especialidad');

                        foreach ($esp as $e) {?>
                          <span class="etiqueta">
                          <?php echo esc_html( $e ) ;?>
                          </span>
                       <?php }?>
                        
                      </div>

                    </div>
              </Li>
              <?php endwhile; wp_reset_postdata(); ?>
</ul>
<?php
function gymfitness_testimoniales(){ ?>
  <ul class="listado-testimoniales swiper-wrapper">
  <?php
          $args = array('post_type' =>'testimoniales',
                );
                $testimoniales = new WP_Query ($args) ;
                While ($testimoniales->have_posts() ):
                $testimoniales ->the_post () ; ?>
                <Li class="testimonial text-center swiper-slide"> 
                  <blockquote>
                    <?php the_content(); ?>
                  </blockquote>

                  <footer class="testimonial-footer">
                    <?php the_post_thumbnail('thumbnail'); ?>
                      <p>
                        <?php the_title(); ?>
                      </p>
                  </footer>
                </Li>
                <?php endwhile; wp_reset_postdata(); ?>
  </ul>
<?php
}


}