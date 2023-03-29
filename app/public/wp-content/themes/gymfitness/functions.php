<?php 

//**Consultas reutilizables */
require get_template_directory(). '/inc/queries.php';
//cuando el tema es activado
function gymfitness_setup(){
    //Habilitar imagenes destacadas
    add_theme_support('post-thumbnails');
//Agregar los tamaño de las imagen
add_image_size('square', 350, 350, true);
add_image_size('portrait', 350, 724, true);
add_image_size('cajas', 400, 375, true);
add_image_size('mediano', 700, 400, true);
add_image_size('blog', 966, 644, true);
}
add_action('after_setup_theme','gymfitness_setup');

//Menu de navegacion.
function gymfitness_menus(){
    register_nav_menus(array(
        'menu-principal'=> __('Menu Principal','gymfitness')
        //Aquí puedes agregar otro menú Cómo en el código de arriba.
    ));

}
//añadiendo el menú desde que inicie la página.
add_action('init','gymfitness_menus');

//Aquí se podrán cargar los Script y los estilos e incluso javaScrip.
function gymfitness_scripts_styles(){
    
//normalize tiene que cargar primero porque es un reset
    wp_enqueue_style('normalize', get_template_directory_uri().'/css/normalize.css', array(),'8.0.1');
    ///Carga el estilo de slicknav que es el menu para movil
    wp_enqueue_style('slicknavCSS', get_template_directory_uri().'/css/slicknav.min.css', array(),'1.0.10');
///Carga el estilo de lightbox que es para la galeria
    if (is_page('galaria')) {   
wp_enqueue_style('lightboxCSS', get_template_directory_uri().'/css/lightbox.min.css', array(),'2.11.3');
    }
    wp_enqueue_style('googleFont','https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&family=Raleway:wght@400;600;900&family=Staatliches&display=swap
', array(),'1.0.0');

    wp_enqueue_style('swiper-css','https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(),'8.4.5');

//Hoja de estilo principal
    wp_enqueue_style( 'style', get_stylesheet_uri(), array('normalize','googleFont'),'1.0.0');

    //este es para cargar una hoja de script
    wp_enqueue_script( 'slicknav', get_template_directory_uri().'/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true );
    
    wp_enqueue_script( 'anime', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', array(), '2.0.2', true );

    
    wp_enqueue_script( 'scripts', get_template_directory_uri().'/js/scripts.js', array('jquery','slicknav','anime'), '1.0.0', true );
    ///Carga el js de lightbox que es para la galeria
    if (is_page('galaria')) {

    
    wp_enqueue_script( 'lightboxJs', get_template_directory_uri().'/js/lightbox.min.js', array('jquery'), '2.11.3', true );
        
    }
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), '8.4.5', true );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('swiper-js'), '1.0.0', true );
    
}
add_action('wp_enqueue_scripts','gymfitness_scripts_styles');

// Definir Zona de Widgets

function gymfitness_widgets() {
register_sidebar(array(
    'name'=> 'Sidebar 1',
    'id'=>'sidebar_1',
    'before_widget' =>'<div class="widget">',
    'after_widget' => '</div»',
    'before_title' => '<h3 class="text-center texto-primario">',
    'after_title' => '<h3>'
));
register_sidebar(array(
    'name'=> 'Sidebar 2',
    'id'=>'sidebar_2',
    'before_widget' =>'<div class="widget">',
    'after_widget' => '</div»',
    'before_title' => '<h3 class="text-center texto-primario">',
    'after_title' => '<h3>'
));

}
add_action ('widgets_init', 'gymfitness_widgets' );

function gymfitness_ubicacion_shotcode(){
    ?>
    <div class='mapa'>
        <?php
                    if (is_page('contactos')) {
                            the_field('ubicacion');
                        }
                        
                        ?>
</div>
                <h2 class='text-center texto-primario'>Fomulario de Contacto</h2>
<?php
            echo do_shortcode('[contact-form-7 id="84" title="Contact form 1"]');
                    }

add_shortcode( 'gymfitness_ubicacion', 'gymfitness_ubicacion_shotcode' );
/**Imagenes dinamicas como GG */
function gymfintness_heri_imagen(){
    // obtener el ID de la pagina de Inicio
    $front_id = get_option('page_on_front');
    //obtener la imagen
    $id_imagen = get_field('hero_imagen', $front_id);
//var_dump($id_imagen);
    //Obtener la ruta de la imagen
    $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];
    //var_dump($imagen);
    // crear css
    wp_register_style('custom',false);
    wp_enqueue_style('custom');
    $imagen_destacada_css = "

           body.home .header {
   background-image: linear-gradient(rgb(0 0 0 / 0.75), rgb(0 0 0 / 0.75)), url($imagen);

}
    ";

    //INyectar CSS
    wp_add_inline_style('custom',$imagen_destacada_css);

}

add_action('init','gymfintness_heri_imagen');