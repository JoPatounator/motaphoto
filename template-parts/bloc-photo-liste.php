<div class="bloc-photo-liste">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('large'); ?>
    </a>

    <div class="photo-hover">
        <a href="<?php the_permalink(); ?>" class="icon-eye" aria-label="Voir la photo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_eye.png" alt="Icône œil">
        </a>

        <a href="#" class="icon-fullscreen"
           data-img="<?php echo get_the_post_thumbnail_url(); ?>"
           data-ref="<?php the_field('reference'); ?>"
           data-cat="<?php
               $terms = get_the_terms(get_the_ID(), 'categorie');
               echo $terms && !is_wp_error($terms) ? esc_html($terms[0]->name) : '';
           ?>">
           <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Icon_fullscreen.png" alt="Icône plein écran">
        </a>
    </div>
</div>
