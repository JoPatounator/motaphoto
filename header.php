<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head elements and the navigation menu.
 *
 * @package motaphoto
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class( $single_photo_class ); ?>>
    <header id="site-header" class="site-header">
        <div class="header-container">
            <!-- Logo -->
             <div class="logo-container">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <img src="http://localhost/motaphoto/wp-content/uploads/2025/04/logo-nathalie-mota.png" alt="Nathalie Mota" class="logo-image">
                </a>
            </div>

            <!-- Titre Herader -->
            <!-- Dans header.php -->
            
        

            <!-- Menu de navigation -->
            <div class="navigation-container">
                <nav class="main-navigation" role="navigation" aria-label="<?php _e('Menu principal', 'text-domain'); ?>">
                    <?php
                    /* Affiche le menu "Menu principal" enregistré dans le functions.php */
                    wp_nav_menu([
                        'theme_location' => 'main-menu',
                        'container' => false,  // On retire le conteneur généré par WP
                        'walker' => new Ally_Walker_Nav_Menu()
                    ]);
                    ?>
                </nav>
            </div>
        </div><!-- .header-container -->
    </header><!-- #site-header -->

    <?php
    // Reste du contenu du site
    ?>