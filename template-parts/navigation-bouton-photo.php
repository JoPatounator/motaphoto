<div class="container-navigation-bouton-photo">
  <div class="bloc-interaction-gauche">
    <div class="question-contact-bouton">
        <p>Cette photo vous intéresse ?</p>
    </div>
    <div class="contact-button">
        <button id="bouton-photo" class="btn-contact open-modal">Contact</button>
    </div>
  </div>

  <div class="bloc-interaction-droit">
    <div class="bloc-photo-fleche-nav">

      <div class="fleches-navigation-photos">

        <?php
        //  Récupère tous les posts du type 'photo'
        $all_photos = get_posts([
            'post_type' => 'photo',       // type personnalisé "photo"
            'posts_per_page' => -1,       // -1 = tous les posts
            'fields' => 'ids',            // récupère uniquement les IDs (plus rapide)
            'orderby' => 'date',          // triés par date
            'order' => 'ASC'              // du plus ancien au plus récent
        ]);

        //  Récupère l'ID du post actuellement affiché
        $current_id = get_the_ID();

        //  Trouve la position de ce post dans le tableau
        $current_index = array_search($current_id, $all_photos);

        //  Compte total de photos
        $total = count($all_photos);

        //  Calcule l’index du précédent (en boucle circulaire)
        $prev_index = ($current_index - 1 + $total) % $total;

        //  Calcule l’index du suivant (en boucle circulaire)
        $next_index = ($current_index + 1) % $total;

        //  Récupère les IDs correspondant
        $prev_id = $all_photos[$prev_index];
        $next_id = $all_photos[$next_index];
        ?>

        <!--  Lien vers la photo précédente -->
        <a href="<?php echo get_permalink($prev_id); ?>" class="prev">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-gauche.png" alt="Précédente">
        </a>

        <!--  Lien vers la photo suivante -->
        <a href="<?php echo get_permalink($next_id); ?>" class="next">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-droite.png" alt="Suivante">
        </a>
      </div>

      <!--  Miniature actuelle -->
      <div class="image-navigation-photo">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); ?>
        <?php endif; ?>
      </div>

    </div>
  </div>
</div>
