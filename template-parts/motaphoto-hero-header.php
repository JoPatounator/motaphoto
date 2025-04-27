<!-- Fichier motaphoto-hero-header.php -->
<?php
$hero_image = get_query_var('hero_image');
?>

<div class="hero-header-image">
    <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Header Image">
</div>