<?php

/**
 * The template for displaying the front page
 *
 * This is the template that displays the front page of your WordPress site.
 * You can use this template to customize the layout and content of your front page.
 */

get_header(); ?>

<main class="front-page">
    <div class="container">
        <!-- Banner -->
        <div class="banner">
            <img src="http://template.local/wp-content/uploads/2024/06/Banner-scaled.jpeg" alt="Banner">
            <div class="banner-text">
                <h1>BLOG</h1>
            </div>
        </div>

        <div class="blog-container">
            <h2>Nuestro Blog</h2>
            <p class="blog-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam.</p>
            
            <!-- Barra de búsqueda -->
            <div class="search-bar">
                <div class="search-input-wrapper">
                    <input type="text" id="search-input" placeholder="Buscar">
                    <span id="search-icon" class="search-icon">&#128269;</span>
                </div>
            </div>

            <!-- Botones de categorías -->
            <div class="categories">
                <button data-category="all">Todos</button>
                <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                    echo '<button data-category="' . $category->slug . '">' . $category->name . '</button>';
                }
                ?>
            </div>

            <!-- posts -->
            <div class="posts-list">
                <?php
                $args = array('post_type' => 'post', 'posts_per_page' => -1);
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $categories = get_the_category();
                        $category_classes = '';
                        foreach ($categories as $category) {
                            $category_classes .= ' ' . $category->slug;
                        }
                        ?>
                        <div class="post-item<?php echo $category_classes; ?>">
                            <div class="post-thumbnail">
                                <?php 
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full');
                                } 
                                ?>
                            </div>
                            <div class="post-content">
                                <div class="post-meta">
                                    <!-- fecha -->
                                    <span><?php echo get_the_date(); ?></span> -
                                    <!-- categoria -->
                                    <span><?php echo get_the_category_list(', '); ?></span>
                                </div>
                                <h2><?php the_title(); ?></h2>
                                <div class="post-excerpt"><?php the_excerpt(); ?></div>
                                <a class="read-more" href="<?php the_permalink(); ?>">Leer más</a>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p>No se encontraron posts.</p>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>





</main>

<?php get_footer();