<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <h1><?php bloginfo('name'); ?></h1>
                <?php endif; ?>
            </a>
        </div>

        <nav class="main-navigation">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'menu_principal', // La ubicación que registraste
                'container'      => 'nav',           // Contenedor HTML (puede ser 'div', 'nav', etc.)
                'container_id'   => 'menu-principal',// ID del contenedor
                'menu_class'     => 'menu',          // Clase CSS para el menú
                'fallback_cb'    => false,           // Callback si no hay menú asignado
            ) );
            ?>
        </nav>
    </div>
</header>
