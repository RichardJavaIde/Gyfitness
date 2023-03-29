<?php
get_header();
?>

<h1>hOLA DESDE INDEX.PHP</h1>
<main>
    <?php
        while (have_posts()): the_post();
            the_title();
            the_content();

        endwhile;
          
    ?>    

</main>
<?php 
get_footer();
?>