<?php

/**
 * The template for displaying all single posts
 *
 * @link 
 *
 * @package wikpis
 */

get_header(); ?>

<main id="primary" class="site-main main-single-blog">
    <section class="single-blog max-width">
        <h1 class="h1 single-blog__h1"><?php the_title(); ?></h1>
        <div class="single-blog__info">
            <span class="single-blog__span"><?php the_author(); ?></span>
            <span class="single-blog__data">Publicado: <?php the_date(); ?></span>
        </div>
    </section>

    <section class="content content-blog max-width">
        <?php the_content(); ?>
    </section>

</main><!-- #main -->

<?php
get_footer();
