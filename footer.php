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
            <a href="<?php echo esc_url(get_permalink(get_page_by_title('Politique de confidentialité'))); ?>">Vie privée</a>
            <span class="footer-copyright">Tous droits réservés</span>
        </div>
    </div><!-- .footer-container -->
</footer><!-- #colophon -->

<!-- Appel du fichier modale test -->
<?php get_template_part('template-parts/modale-contact', 'contact'); ?>

<!-- Scripts JavaScript -->
<?php wp_footer(); ?>

<div id="lightbox" class="lightbox hidden">
  <div class="lightbox-overlay"></div>

  <div class="lightbox-content">
    <div class="lightbox-inner">
        <button class="lightbox-nav lightbox-prev" aria-label="Photo précédente">
        <span class="lightbox-label">Précédente</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-gauche-white.png" alt="Précédente" />
      </button>
      <img id="lightbox-image" src="" alt="Photo en plein écran" />
      <div class="lightbox-meta">
        <p id="lightbox-ref">Référence: xxx</p>
        <p id="lightbox-cat">Catégorie: </p>
      </div>
      <button class="lightbox-nav lightbox-next" aria-label="Photo suivante">
        <span class="lightbox-label">Suivante</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-droite-white.png" alt="Suivante" />
      </button>
    </div>

    <!-- Flèches de navigation placées ici -->
    <div class="nav-blocs">
    </div>

    <button id="lightbox-close" aria-label="Fermer la lightbox">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fermeture-croix-lightbox.png" alt="fermeture lightbox" />
    </button>
  </div>
</div>


</body>

</html>