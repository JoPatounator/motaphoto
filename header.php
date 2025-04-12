<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package motaphoto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'motaphoto' ); ?></a>

	<header class="site-header">
    <div class="header-container">
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/../../uploads/2025/04/logo-nathalie-mota.png" alt="Logo de Nathalie Mota" class="logo-image">
        </a>

        <!-- Menu de navigation -->
        <nav class="main-navigation">
            <ul class="menu">
                <li><a href="#accueil">ACCUEIL</a></li>
                <li><a href="#a-propos">À PROPOS</a></li>
                <li><a href="#contact">CONTACT</a></li>
            </ul>
        </nav>
    </div>
</header>