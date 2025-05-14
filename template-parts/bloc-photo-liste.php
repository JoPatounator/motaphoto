<?php
/**
 * Template part pour afficher un bloc de photo
 *
 * @package motaphoto
 */
?>

<div class="bloc-photo-liste">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('large'); ?>
    </a>
</div>