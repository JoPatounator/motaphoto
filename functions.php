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
function motaphoto_theme_support() {
    // Active le titre dynamique dans la balise <title>
    add_theme_support('title-tag');
    
    // Active les images mises en avant pour les articles
    add_theme_support('post-thumbnails');
    
    // Active la prise en charge du HTML5
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    
    // Enregistre les menus
    register_nav_menus(array(
        'primary' => __('Menu principal', 'motaphoto'),
        'footer'  => __('Menu pied de page', 'motaphoto')
    ));
    /*
    // Active les feeds RSS
    add_theme_support('automatic-feed-links');*/
}
add_action('after_setup_theme', 'motaphoto_theme_support');

// =====================================
// 2. CHARGEMENT DES STYLES ET SCRIPTS
// =====================================
function motaphoto_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');
    
    // CSS principal compilé depuis Sass
    wp_enqueue_style(
        'motaphoto-main-style',
        get_template_directory_uri() . '/assets/css/main-style.css',
        array(),
        $theme_version
    );

    // Fichier style.css requis par WordPress (métadonnées uniquement)
    wp_enqueue_style(
        'motaphoto-theme-style',
        get_stylesheet_uri(),
        array('motaphoto-main-style'), // Dépendance
        filemtime(get_template_directory() . '/style.css') // Version basée sur la date de modification
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
/*
// =====================================
// 3. FONCTIONNALITÉS SUPPLÉMENTAIRES
// =====================================
// Active la gestion des traductions
load_theme_textdomain('motaphoto', get_template_directory() . '/languages');

// Ajoute une classe CSS au body pour la page courante
function motaphoto_body_class($classes) {
    if (is_singular()) {
        $classes[] = 'is-singular';
    }
    return $classes;
}
add_filter('body_class', 'motaphoto_body_class');*/