<?php
/**
 * Fonctions du thème Motaphoto
 */
/*
// Sécurité : Empêche l'accès direct au fichier
if (!defined('WPINC')) {
    die;
}*/

// =====================================
// 1. CONFIGURATION DE BASE DU THÈME
// =====================================
    
// Enregistre les menus
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'text-domain' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );



// =====================================
// 2. CHARGEMENT DES STYLES ET SCRIPTS
// =====================================
function motaphoto_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');
    
    // CSS principal compilé depuis Sass
    wp_enqueue_style('motaphoto-main-style', get_template_directory_uri() . '/assets/css/main-style.css', array(), $theme_version
    );

    // Fichier style.css requis par WordPress (métadonnées uniquement)
    wp_enqueue_style(
        'motaphoto-theme-style', get_stylesheet_uri(), array('motaphoto-main-style'), filemtime(get_template_directory() . '/style.css') 
    );

    // Scripts JavaScript
    wp_enqueue_script(
        'motaphoto-scripts',
        get_template_directory_uri() . '/js/scripts.js',
        array('jquery'), // Dépendance de jQuery
        $theme_version,
        true // Chargement en footer
    );
}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_assets');

require_once get_template_directory() . '/menus.php'; // Chargement du walker "Ally_Walker_Nav_Menu" contenu dans le fichier "menus.php"



