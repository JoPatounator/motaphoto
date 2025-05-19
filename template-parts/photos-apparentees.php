<div class="photos-apparentees">
  <?php
  $terms = get_the_terms(get_the_ID(), 'categorie'); // recup  termes de taxonomie 'categorie' du post actuel
  if ($terms && !is_wp_error($terms)) {
      $current_category = $terms[0]->term_id;
      $args = array(
          'post_type' => 'photo',
          'tax_query' => array(
              array(
                  'taxonomy' => 'categorie',
                  'field' => 'term_id',
                  'terms' => $current_category,
              ),
          ),
          'posts_per_page' => 2,
          'post__not_in' => array(get_the_ID()), // Exclure la photo actuelle
      );
      $photos_apparentees = new WP_Query($args);
  ?>
  
  <?php if ($photos_apparentees->have_posts()) : ?>
    <div class="photo-grid">
      <?php while ($photos_apparentees->have_posts()) : $photos_apparentees->the_post(); ?>
        <?php get_template_part( 'template-parts/bloc-photo-liste', 'bloc-photo-liste' ); ?>
      <?php endwhile; ?>
    </div>
  <?php else : ?>
    <p>Aucune photo apparentée dans cette catégorie.</p>
  <?php endif; wp_reset_postdata(); ?>
  <?php
  } else {
  ?>
    <p>Aucune catégorie associée à cette photo.</p>
  <?php
  }
  ?>
</div>