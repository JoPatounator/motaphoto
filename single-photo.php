<?php
/**
 * Template pour afficher un post unique de type "photo"
 */

get_header(); ?>

<main id="main-single-photo" class="main-single-photo">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!--<article id="post-<?php //the_ID(); ?>" <?php //post_class(); ?>>-->
    <article class="article-photo">
      <div class="bloc-info-image">
        <!-- Bloc gauche : Infos de la photo -->
        <section class="infos-contenu-photo">
          <?php get_template_part( 'template-parts/infos-contenu-photo', 'contenu-photo' ); ?>
        </section>
        
        <!-- Bloc droit : Image principale -->
        <section class="image-contenu-photo">
          <?php get_template_part( 'template-parts/image-contenu-photo', 'image-contenu-photo' ); ?>
        </section>
      </div>
      <!-- Bloc bas : Contact et navigation -->
      <section class="navigation-bouton-photo">
        <?php get_template_part( 'template-parts/navigation-bouton-photo', 'navigation-bouton-photo' ); ?>
      </section>
      
      <!-- Photos apparentées -->
      <section class="photos-apparentees">
        <?php get_template_part( 'template-parts/photos-apparentees', 'photos-apparentees' ); ?>
      </section>
      
    </article>
  <?php endwhile; else : ?>
    <p><?php esc_html_e( 'Désolé, aucun contenu trouvé.', 'textdomain' ); ?></p>
  <?php endif; ?>
</main>

<?php
get_footer();
?>