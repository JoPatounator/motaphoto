<?php

/**
 * Template Name: Page d'accueil Motaphoto
 * Description: Un modèle personnalisé pour afficher la page d'accueil statique.
 */

get_header(); // Inclut le header 
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php motaphoto_hero_header(); // Injecte image hero header 
        ?>
        <?php get_template_part('template-parts/filtres-photos'); ?>
        <div class="catalogue-photo">
            <div class="catalogue-photo">
                <div class="photo-grid">
                    <!-- Contenu injecté dynamiquement via AJAX -->
                </div>
            </div>

        </div>
        <div id="chargeur-photos" style="display: none;">Chargement...</div>
        <button id="bouton-charger-plus" class="bouton-charger-plus">Charger plus</button>


    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); // Inclut le footer 
?>