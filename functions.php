<?php
/**
 * Fonctions du thème Motaphoto
 */
/*
// Sécurité : Empêche l'accès direct au fichier
if (!defined('WPINC')) {
    die;
}*/
    
// Enregistrement des menus
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );



//-------------------------------------
// Chargement styles et scripts
//-------------------------------------

function motaphoto_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');
    
    // CSS principal compilé depuis Sass
    wp_enqueue_style('motaphoto-main-style', get_template_directory_uri() . '/assets/css/main-style.css', array(), $theme_version
    );

    // Fichier style.css 
    wp_enqueue_style(
        'motaphoto-theme-style', get_stylesheet_uri(), array('motaphoto-main-style'), filemtime(get_template_directory() . '/style.css') 
    );

    // Scripts JavaScript
    wp_enqueue_script(
        'motaphoto-scripts',
        get_template_directory_uri() . '/assets/js/script.js',
        array('jquery'), // Dépendance de jQuery
        $theme_version,
        true // Chargement en footer
    );

}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_assets');


//---------------------------------------------------------------------------------------------

function enqueue_modale_scripts() {
    // Enqueue le script principal
    wp_enqueue_script( 
        'modale-contact-js', 
        get_theme_file_uri('/assets/js/modale-contact.js'), 
        array('jquery'), 
        null, 
        true 
    );

    if ( is_singular('photo') ) {
        $photo_ref = get_field('reference');
        wp_localize_script( 
            'modale-contact-js', 
            'photoData', 
            array( 'ref' => $photo_ref ) 
        );
    }
}
add_action( 'wp_enqueue_scripts', 'enqueue_modale_scripts' );
//---------------------------------------------------------------------------------------------

require_once get_template_directory() . '/menus.php'; // Chargement du walker "Ally_Walker_Nav_Menu" contenu dans le fichier "menus.php"



// Gestion de la photo du Hero-Header

function motaphoto_hero_header() {
    // Selection un post aléatoire de type "photo"
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 1,
        'orderby'        => 'rand', 
    );

    $random_photo = new WP_Query($args);

    // Test si post existe et recup URL
    if ($random_photo->have_posts()) {
        while ($random_photo->have_posts()) {
            $random_photo->the_post();
            $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); // chargement de la variable avec url. 'full' taille originale
        }
        wp_reset_postdata(); // reset la requête WP
    } else {
        // Image par défaut si aucun post n'est trouvé
        $hero_image = get_template_directory_uri() . '/assets/images/hero-header.jpeg';
    }

    // transmision de la var au template part via set_query_var
    set_query_var('hero_image', $hero_image);

    // Appel du template pa rt
    get_template_part('template-parts/motaphoto-hero-header', 'hero-header');
}

//-------------------------------------------------------- Paramétrage de la fenetre modale ------------------------------------------------------

// Formulaire fenetre modale
// Désactiver l'enveloppement automatique par des balises <p> dans Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

function ajout_class_contact_link($atts, $item, $args) {
    if ($item->title === 'Contact') {
        $atts['class'] = 'open-modal';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'ajout_class_contact_link', 10, 3);