<div class="photo-image-container">
  <?php 
  $image = get_the_post_thumbnail_url();
  if ( $image ) :
  ?>
    <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" style="object-fit: cover;">
  <?php else : ?>
    <div class="placeholder">Aucune image</div>
  <?php endif; ?>
</div>