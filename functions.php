<?php
// Ajout du support des menus WordPress
function theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Menu principal', 'motaphoto'),
    ));
}
add_action('after_setup_theme', 'theme_support');

// Chargement des scripts et styles
function enqueue_scripts_styles()
{
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_styles');
