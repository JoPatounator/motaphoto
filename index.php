<?php get_header(); ?>

<main>
    <h1>Bienvenue sur le site de Nathalie Mota</h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h2><?php the_title(); ?></h2>
                <div><?php the_content(); ?></div>
            </article>
    <?php endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>