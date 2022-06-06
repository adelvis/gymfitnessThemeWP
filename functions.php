<?php

//consultas reutilizable
require get_template_directory().'/inc/queries.php';
// Shortcodes
require get_template_directory().'/inc/shortcodes.php';

 // Configuracion en la activacion del tema
 
 function gymfitness_theme_setup(){
   
    /** tag-title Habilitar titulos SEO **/
    add_theme_support( 'title-tag' );
 
    /** post thumbnail **/
    add_theme_support( 'post-thumbnails' );
    
    // Agregar tamaños de imagenes personalizados
    add_image_size('square', 350, 350,true);
    add_image_size('portrait', 350, 724,true);
    add_image_size('box', 400, 375,true);
    add_image_size('mediumm', 700, 400,true);
    add_image_size('blog', 966, 644,true);
  
 
 
}
 add_action('after_setup_theme','gymfitness_theme_setup');

 // Menu de navegaciòn
 function gymfitness_menus(){

    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'gymfitness')
    ));

}

add_action('init', 'gymfitness_menus');

// Scripts y Styles
function gymfitness_scripts_styles(){
    
    //Agregar normalize
    wp_enqueue_style('normalize', get_template_directory_uri().'/css/normalize.css', array(), '8.0.1');
    
    // Menu para movil SlickNav
    wp_enqueue_style('slickNavCss', get_template_directory_uri().'/css/slicknav.min.css', array(), '1.0.10');

    
    if(is_page('galeria')):
        // Galeria Lightbox2
        wp_enqueue_style('Lightbox2Css', get_template_directory_uri().'/css/lightbox.min.css', array(), '2.11.2');
    endif;

    // Mapa
    
    if(is_page('contacto')):
        // Mapa con Leaflet
        wp_enqueue_style('LeafletCss', 'https://unpkg.com/leaflet@1.8.0/dist/leaflet.css', array(), '1.8.0');
    endif;

    // bxSlider 
    if(is_page('inicio')):
        wp_enqueue_style('bxSliderCss', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
    endif;

    // Agrega fuente Google 
    wp_enqueue_style( 'googleFont', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700&family=Staatliches&display=swap', array(), '1.0.0');

    // Hoja de Style Principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0');

    // Menu para movil SlickNav Js
    wp_enqueue_script('slickNavJs', get_template_directory_uri().'/js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);
    
    if(is_page('galeria')):
        // Galeria Lightbox2 Js
        wp_enqueue_script('Lightbox2Js', get_template_directory_uri().'/js/lightbox.min.js', array('jquery'), '2.11.1', true);
    endif;

    //Mapa 
    
    if(is_page('contacto')):
        //  Mapa con Leaflet Js
        wp_enqueue_script('LeafletJs', 'https://unpkg.com/leaflet@1.8.0/dist/leaflet.js', array(), '1.8.0', true);
    endif;

    //bxSlider
    if(is_page('inicio')):
        //  Mapa con Leaflet Js
        wp_enqueue_script('bxSliderJs', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
    endif;


    // Registra los Script propios del tema
    wp_enqueue_script('scripts', get_template_directory_uri().'/js/script.js', array('jquery', 'slickNavJs'), '1.0.0', true);

}
add_action( 'wp_enqueue_scripts', 'gymfitness_scripts_styles' );


    // Habilitar zona de widgets

function gymfitness_widgets(){

    register_sidebar(array(
        'name' => 'Sidebar_1',
        'id' => 'sidebar_1',
        'before_widget'=>'<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3>'

    ));

    register_sidebar(array(
        'name' => 'Sidebar_2',
        'id' => 'sidebar_2',
        'before_widget'=>'<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center text-primary">',
        'after_title' => '</h3>'

    ));


}
add_action('widgets_init', 'gymfitness_widgets');

 /*image hero */
 function gymfitness_hero_image(){

    //Obtener ID de la pagina principal
    $front_page_id = get_option('page_on_front');

    //Obtene ID de la imagen
    $id_imagen = get_field('imagen_hero', $front_page_id);

    //Obtener la imagen
    $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];

    // Style CSS
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $imagen_destacada_css = "
        body.home .site-header{
            background-image: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)),url($imagen) ;
        }
    ";
    wp_add_inline_style( 'custom', $imagen_destacada_css );

}
add_action('init', 'gymfitness_hero_image');