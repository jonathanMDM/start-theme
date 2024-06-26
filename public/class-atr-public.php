<?php
class ATR_Public
{
    private $theme_name;
    private $version;

    public function __construct($theme_name, $version)
    {
        $this->theme_name = $theme_name;
        $this->version = $version;
    }

    public function enqueue_styles()
    {
        wp_enqueue_style(
            'public-css',
            ATR_DIR_URI . 'public/css/style.css',
            array(),
            $this->version,
            'all'
        );
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script(
            'public-js',
            ATR_DIR_URI . 'public/js/app.js',
            ['jquery'],
            $this->version,
            true
        );
        wp_localize_script(
            'public-js',
            'adminAJAX',
            [
                'ajaxurl' => admin_url('admin-ajax.php'),
                "nonce" => wp_create_nonce('wkdata_seg')
            ]
        );
    }
    /**
     * Funciones para ajustar el menu para el frontend
     */
    public function atr_menus_frontend()
    {
        /**
         * Registrar menus
         */
        register_nav_menus([
            'menu_primary' => __('Menu principal', $this->theme_name)
        ]);

        $logo = [
            'width' => 230,
            'height' => 80,
            'flex-height' => true,
            'flex-width'  => true,
        ];
        add_theme_support('custom-logo', $logo);
    }
}