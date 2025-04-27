<?php
/**
 * Template Name: Page d'accueil Motaphoto
 * Description: Un modèle personnalisé pour afficher la page d'accueil statique.
 */

get_header(); // Inclut le header ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php motaphoto_hero_header(); // Injecte l'image hero header ?>
        <?php
        // Vérifie si la page a du contenu
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <!--<h1 class="entry-title"><?php // the_title(); ?></h1>-->
                    </header>

                    <div class="entry-content">
                        <?php the_content(); // Affiche le contenu de la page ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            // Si aucun contenu n'est trouvé
            echo '<p>Aucun contenu disponible.</p>';
        endif;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); // Inclut le footer ?>