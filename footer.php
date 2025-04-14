<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package motaphoto
 */

?>
<div footer id="colophon" class="site-footer">
    <div class="footer-container">
        <!-- Liens du footer -->
        <div class="footer-links">
            <a href="<?php echo esc_url(get_permalink(get_page_by_title('Mentions légales'))); ?>">Mentions légales</a>
            <a href="<?php echo esc_url(get_privacy_policy_url()); ?>">Vie privée</a>
        </div>

        <!-- Colophon -->
        <div class="footer-colophon">
            <p>Site réalisé avec ❤️ par [Votre Nom]. Technologie utilisée : WordPress, SCSS, jQuery. Polices locales pour une meilleure performance.</p>
        </div>

        <!-- Mention "Tous droits réservés" -->
        <div class="footer-copyright">
            <p>&copy; <?php echo esc_html(date('Y')); ?> Tous droits réservés.</p>
        </div>
    </div><!-- .footer-container -->
</div><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
