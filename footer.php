<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package motaphoto
 */

?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="footer-container">
        <!-- Liens du footer -->
        <div class="footer-links">
            <a href="<?php echo esc_url(get_permalink(get_page_by_title('Mentions légales'))); ?>">Mentions légales</a>
            <a href="<?php echo esc_url(get_privacy_policy_url('#')); ?>">Vie privée</a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_title('Tous droits réservés'))); ?>">Tous droits réservés</a>
        </div>
    </div><!-- .footer-container -->
</footer><!-- #colophon -->

<!-- Appel du fichier modale test -->
<?php get_template_part('template-parts/modale-contact', 'contact'); ?>

<!-- Scripts JavaScript -->
<?php wp_footer(); ?>

<!-- Lightbox -->
<div id="lightbox" class="lightbox hidden">
    <div class="lightbox-overlay"></div>
    <button class="lightbox-nav lightbox-prev" aria-label="Photo précédente">
        <span class="lightbox-label">Précédente</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-gauche-white.png" alt="Précédente">
    </button>

    <button class="lightbox-nav lightbox-next" aria-label="Photo suivante">
        <span class="lightbox-label">Suivante</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-droite-white.png" alt="Suivante">
    </button>

    <div class="lightbox-content">
        <div class="lightbox-inner">
            <img id="lightbox-image" src="" alt="Photo en plein écran">

            <div class="lightbox-meta">
                <p id="lightbox-ref">Référence: xxx</p>
                <p id="lightbox-cat">Catégorie: </p>
            </div>
        </div>

        <button id="lightbox-close" aria-label="Fermer la lightbox">✕</button>
    </div>


</div>

</body>

</html>