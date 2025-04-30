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
</body>

</html>
