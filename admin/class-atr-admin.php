<?php
class ATR_Admin
{
    private $theme_name;
    private $version;

    public function __construct($theme_name, $version)
    {
        $this->theme_name = $theme_name;
        $this->version = $version;

        // Inicializar la administración
        $this->init_admin();
    }
    public function enqueue_scripts($hook)
    {
        wp_localize_script(
            $this->theme_name,
            'adminAJAX',
            [
                'urlajax' => admin_url('admin-ajax.php'),
                'seguridad' => wp_create_nonce('atr_seg')
            ]
        );
    }
    // Inicializar la administración
    private function init_admin()
    {
        // Agregar páginas de opciones de ACF
        add_action('acf/init', array($this, 'add_acf_options_pages'));
        add_theme_support('post-thumbnails');
    }

    // Agregar páginas de opciones de ACF
    public function add_acf_options_pages()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title'    => 'Theme General Settings',
                'menu_title'    => 'Theme Settings',
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ));
            acf_add_options_sub_page(array(
                'page_title'    => 'Header Settings',
                'menu_title'    => 'Header',
                'parent_slug'   => 'theme-general-settings',
            ));
            acf_add_options_sub_page(array(
                'page_title'    => 'Footer Settings',
                'menu_title'    => 'Footer',
                'parent_slug'   => 'theme-general-settings',
            ));
        }
    }
}
