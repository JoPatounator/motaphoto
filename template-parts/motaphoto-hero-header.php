<!-- Fichier motaphoto-hero-header.php -->
<?php
$hero_image = get_query_var('hero_image');
?>

<div class="hero-header-image">
    <div class="header-title-container">
        <?php if ( is_front_page() || is_home() ) : ?>
            <h1 class="header-title">PHOTOGRAPHE EVENT</h1>
            <?php endif;
        ?>
    </div>
    <img src="<?php echo esc_url($hero_image); ?>" alt="Hero Header Image">
</div>