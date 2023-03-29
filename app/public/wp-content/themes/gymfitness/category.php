<?php
get_header();
?>

<main class= "seccion contenedor ">
    <?php
    $categoria = get_queried_object();
    ?>
        <h2 class="texto-primario text-center">Categoria:  <?php echo $categoria->name; ?></h2>
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