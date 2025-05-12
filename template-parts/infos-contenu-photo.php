<div class="photo-info-container">
  <h2 class="photo-title"><?php the_title(); ?></h2>
  
  <div class="meta-data">
    <p class="meta-item"><span class="label">Référence : </span> <?php echo get_field('reference'); ?></p>
    <p class="meta-item"><span class="label">Catégorie : </span> <?php echo get_the_term_list( get_the_ID(), 'categorie'); ?></p>
    <p class="meta-item"><span class="label">Format : </span> <?php echo get_the_term_list( get_the_ID(), 'format'); ?></p>
    <p class="meta-item"><span class="label">Type : </span> <?php echo get_field('type'); ?></p>
    <p class="meta-item"><span class="label">Année : </span> <?php echo get_the_date('Y'); ?></p>
  </div>
</div>