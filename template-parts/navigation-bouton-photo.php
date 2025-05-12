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
    <div class="fleches-navigation-photos">
        <?php 
        $prev = get_previous_post();
        $next = get_next_post();
        ?>
        <?php if ($prev) : ?>
            <a href="<?php echo get_permalink($prev); ?>" class="prev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-gauche.png" alt="Précédente">
            </a>
        <?php endif; ?>
        <?php if ($next) : ?>
            <a href="<?php echo get_permalink($next); ?>" class="next">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/fleche-droite.png" alt="Suivante">
            </a>
        <?php endif; ?>
    </div>
    <div class="image-navigation-photo">
      <?php if ( has_post_thumbnail() ) : ?>
        <?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); ?>
      <?php endif; ?>
    </div>
  </div>
</div>