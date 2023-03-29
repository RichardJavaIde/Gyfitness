<?php
get_header();
?>

<main class= "seccion contenedor ">
    <ul class="liscado-grid">
         
    
    <?php
        while (have_posts()){
                     the_post();
                       get_template_part('template-parts/blog');
        }
        
    ?>    
    
    </ul>
   </main>
<?php 
get_footer();
?>