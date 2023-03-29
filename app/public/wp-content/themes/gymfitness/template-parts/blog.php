<li class="card">
    <?php the_category(); ?>
      <?php the_post_thumbnail('mediano'); ?>
        <div class="contenido">
            <a href="<?php the_permalink();?>">
                <h3><?php the_title(); ?></h3>
            </a>
            
        </div>
</li>