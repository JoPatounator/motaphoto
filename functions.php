<?php
/**
 * Fonctions du thème Motaphoto
 */

// Enregistrement des menus
function register_my_menu() {
    register_nav_menu('main-menu', __('Menu principal', 'text-domain'));
}
add_action('after_setup_theme', 'register_my_menu');

// Chargement styles et scripts
function motaphoto_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');

    // CSS principal compilé depuis Sass
    wp_enqueue_style(
        'motaphoto-main-style',
        get_template_directory_uri() . '/assets/css/main-style.css',
        array(),
        $theme_version
    );

    // Fichier style.css
    wp_enqueue_style(
        'motaphoto-theme-style',
        get_stylesheet_uri(),
        array('motaphoto-main-style'),
        filemtime(get_template_directory() . '/style.css')
    );

    // Script lightbox
    wp_enqueue_script(
        'motaphoto-lightbox',
        get_template_directory_uri() . '/assets/js/script-lightbox.js',
        array(),
        $theme_version,
        true
    );

    // Script filtres (AJAX)
    wp_enqueue_script(
        'motaphoto-filtres',
        get_template_directory_uri() . '/assets/js/script-filtres.js',
        array(),
        null,
        true
    );

    wp_localize_script(
        'motaphoto-filtres',
        'motaphotoajax',
        array('ajaxurl' => admin_url('admin-ajax.php'))
    );
}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_assets');

// Script de la modale (spécifique au single-photo)
function enqueue_modale_scripts() {
    wp_enqueue_script(
        'modale-contact-js',
        get_theme_file_uri('/assets/js/modale-contact.js'),
        array('jquery'),
        null,
        true
    );

    if (is_singular('photo')) {
        $photo_ref = get_field('reference');
        wp_localize_script(
            'modale-contact-js',
            'photoData',
            array('ref' => $photo_ref)
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_modale_scripts');

require_once get_template_directory() . '/menus.php';

// Gestion de la photo du Hero-Header
function motaphoto_hero_header() {
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'rand',
    );

    $random_photo = new WP_Query($args);

    if ($random_photo->have_posts()) {
        while ($random_photo->have_posts()) {
            $random_photo->the_post();
            $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        }
        wp_reset_postdata();
    } else {
        $hero_image = get_template_directory_uri() . '/assets/images/hero-header.jpeg';
    }

    set_query_var('hero_image', $hero_image);
    get_template_part('template-parts/motaphoto-hero-header', 'hero-header');
}

// Désactivation <p> automatique dans Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

function ajout_class_contact_link($atts, $item, $args) {
    if ($item->title === 'Contact') {
        $atts['class'] = 'open-modal';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'ajout_class_contact_link', 10, 3);


//------------------------------------------------- Filtrage photos selon critères : AJAX ----------------------------------------------
function ajax_filtrer_photos() {
    $categorie = $_POST['categorie'] ?? 'all';
    $format = $_POST['format'] ?? 'all';
    $tri = $_POST['tri'] ?? 'desc'; // soit 'asc' soit 'desc'

    $args = [
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'orderby' => 'date', // on trie toujours par date
        'order' => in_array($tri, ['asc', 'desc']) ? $tri : 'desc', // sécurité
    ];

    $tax_query = [];

    if ($categorie !== 'all') {
        $tax_query[] = [
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $categorie
        ];
    }

    if ($format !== 'all') {
        $tax_query[] = [
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format
        ];
    }

    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/bloc-photo-liste');
        }
        wp_reset_postdata();
    } else {
        echo '<p>Aucune photo trouvée pour ce filtre.</p>';
    }

    wp_die();
}
add_action('wp_ajax_filtrer_photos', 'ajax_filtrer_photos');
add_action('wp_ajax_nopriv_filtrer_photos', 'ajax_filtrer_photos');

// --------------------------------------------------------------------------------------------------------------------------------------

// ----------------------------------------------------- Pagfination infinie via bouton : AJAX ------------------------------------------

function ajax_charger_plus_photos() {
    $categorie = $_POST['categorie'] ?? 'all';
    $format = $_POST['format'] ?? 'all';
    $tri = $_POST['tri'] ?? 'date';
    $offset = intval($_POST['offset'] ?? 0);

    $args = [
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'offset'         => $offset,
        'orderby'        => $tri,
        'order'          => ($tri === 'asc') ? 'ASC' : 'DESC',
    ];

    $tax_query = [];

    if ($categorie !== 'all') {
        $tax_query[] = [
            'taxonomy' => 'categorie',
            'field'    => 'slug',
            'terms'    => $categorie
        ];
    }

    if ($format !== 'all') {
        $tax_query[] = [
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format
        ];
    }

    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/bloc-photo-liste');
        }
        wp_reset_postdata();
    } else {
        echo ''; // rien à charger de plus
    }

    wp_die();
}
add_action('wp_ajax_charger_plus_photos', 'ajax_charger_plus_photos');
add_action('wp_ajax_nopriv_charger_plus_photos', 'ajax_charger_plus_photos');



function motaphoto_enqueue_custom_scripts() {
    // Slim Select CSS & JS (depuis CDN)
    wp_enqueue_style('slimselect-css', 'https://cdn.jsdelivr.net/npm/slim-select@2.8.1/dist/slimselect.min.css');
    wp_enqueue_script('slimselect-js', 'https://cdn.jsdelivr.net/npm/slim-select@2.8.1/dist/slimselect.min.js', array(), null, true);

    // script d'initialisation slimselect
    wp_enqueue_script('motaphoto-slimselect', get_template_directory_uri() . '/assets/js/script-slimselect.js', array('slimselect-js'), null, true);
}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_custom_scripts');