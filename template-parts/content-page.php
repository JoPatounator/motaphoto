<?php
/**
 * Template part for displaying page content
 *
 * @package motaphoto
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
        <?php
        the_content();

        // Pagination si besoin
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'motaphoto'),
                'after'  => '</div>',
            )
        );
        ?>
    </div>
</article>
