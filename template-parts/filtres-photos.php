<?php

?>

<section class="filtres-catalogue">
  <form id="filtre-photo-form" action="" method="POST">

    <!-- 1. Filtre : Catégories -->
    <select name="categorie" id="filtre-categorie" class="filtre-select">
      <option class="option-filtre" value="all">Catégories</option> <!-- Option affichée par defaut : Catégories -->
      <?php
      $categories = get_terms([
        'taxonomy' => 'categorie',
        'hide_empty' => true    // Ne montre que les termes utilises
      ]);
      foreach ($categories as $cat) :
      ?>
        <option class="option-filtre" value="<?php echo esc_attr($cat->slug); ?>"> <!-- Utilise le slug WP comme valeur de formulaire -->
          <?php echo esc_html($cat->name); ?> <!-- Affiche le nom de la categorie : Mariages, Concerts... -->
        </option>
      <?php endforeach; ?>
    </select>

    <!-- 2. Filtre : Formats -->
    <select name="format" id="filtre-format" class="filtre-select-formats">
      <option class="option-filtre" value="all">Formats</option>
      <?php
      $formats = get_terms([
        'taxonomy' => 'format',
        'hide_empty' => true
      ]);
      foreach ($formats as $format) :
      ?>
        <option class="option-filtre" value="<?php echo esc_attr($format->slug); ?>">
          <?php echo esc_html($format->name); ?>
        </option>
      <?php endforeach; ?>
    </select>


    <!-- 3. Filtre : Trier par -->
    <select name="tri" id="filtre-tri" class="filtre-select">
      <option class="option-filtre" value="desc">Trier par : plus récentes</option>
      <option class="option-filtre" value="asc">Trier par : plus anciennes</option>
    </select>


    <!-- Bouton de validation -->
    <!--<button type="submit" class="filtre-valider">Filtrer</button>-->
  </form>
</section>




<!-- Zone de chargement des photos -->
<div id="photo-grid" class="photo-grid" data-page="1">
  <?php
  // WP_Query classique pour page-accueil
  ?>
</div>

<!-- Loader -->
<div id="photo-loader" style="display: none;">Chargement...</div>