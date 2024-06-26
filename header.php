<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta <?php bloginfo('charset'); ?>>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php bloginfo('name');
        if (wp_title('', false)) {echo " | "; } 
        wp_title('') ?>
    </title>
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page">
        <header id="masthead" class="site-header header">
            <div class="header__wrapper max-width">
                <?php the_custom_logo() ?>
                <nav class="header__navigation" id="primaryNavigation">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu_primary',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'header__menu'
                        )
                    );
                    ?>
                </nav>

                <div class="header__toggle" id="handlerToggle">
                    <label class="burger" for="burger">
                        <input type="checkbox" id="burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                </div>

            </div>
        </header>
        <section class="header__menu-movil" id="innerMenu">
            <div class="header__menu-movil--content" id="menuMovil">
                <?php the_custom_logo() ?>
            </div>
        </section>