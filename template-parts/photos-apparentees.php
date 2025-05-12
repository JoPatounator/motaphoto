<div class="related-photos">
  <?php
  $current_category = get_the_terms(get_the_ID(), 'categorie')[0]->term_id;
  $args = array(
    'post_type' => 'photo',
    'tax_query' => array(
      array(
        'taxonomy' => 'categorie',
        'field' => 'term_id',
        'terms' => $current_category,
      ),
    ),
    'posts_per_page' => 5,
  );
  $related_photos = new WP_Query($args);
  ?>
  
  <?php while ($related_photos->have_posts()) : $related_photos->the_post(); ?>
    <div class="bloc-photo-apparentee">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('large'); ?>
        <h3><?php the_title(); ?></h3>
      </a>
    </div>
  <?php endwhile; wp_reset_postdata(); ?>
</div>