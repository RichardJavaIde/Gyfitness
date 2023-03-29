<?php get_header();?>

<main class="contenedor pagina seccion con-sidebar">
    <div class="contenido-principal">
               <?php get_template_part('template-parts/paginas'); ?>
        <div class="comentarios">
    <?php comment_form();?>
</div>
    </div>
    
               
<?php get_sidebar();?>

</main>

<?php get_footer();?>
