<?php
/**
 * Template Name: Page d'accueil Motaphoto
 * Description: Un modèle personnalisé pour afficher la page d'accueil statique.
 */

get_header(); // Inclut le header ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php motaphoto_hero_header(); // Injecte image hero header ?>
        <div class="catalogue-photo">
            <?php
                $args = array(
                    'post_type'      => 'photo',
                    'posts_per_page' => -1,
                    'orderby'        => 'date', 
                    'order'          => 'DESC', 
                );

                $photos_liste = new WP_Query($args);

                if ($photos_liste->have_posts()) : 
            ?>
                    <div class="photo-grid">
                    <?php while ($photos_liste->have_posts()) : $photos_liste->the_post(); ?>
                      <?php get_template_part( 'template-parts/bloc-photo-liste', 'bloc-photo-liste' ); ?>
                    <?php endwhile; ?>
                  </div>
                    <?php wp_reset_postdata(); // reset donnes post
                else :
                    echo '<p>Aucune photo trouvée.</p>';
                endif;
            ?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); // Inclut le footer ?>