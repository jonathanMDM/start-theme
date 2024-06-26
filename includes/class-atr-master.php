<?php

class ATR_Master
{
    protected $charger;
    protected $theme_name;
    protected $version;

    public function __construct()
    {

        $this->theme_name = 'Init Theme';
        $this->version = '1.0.0';

        $this->charger_dependencies();
        $this->charger_instances();
        $this->set_languajes();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function charger_dependencies()
    {
        /**
         * Class responsible for iterating acctions and filters for nucleus in theme
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-charger.php';

        /**
         * Clase responsable de definir la funcionalidad de la internacionalizacion del theme
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-i18n.php';

        /**
         *  Clase responsable de registrar menus y submenus en el area de la administracion
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-build-menupage.php';

        /**
         *  Clase responsable de definir todas las acciones de la administracion
         */
        require_once ATR_DIR_PATH . 'admin/class-atr-admin.php';

        /**
         *  Clase responsable de definir todas las acciones del cliente/public
         */
        require_once ATR_DIR_PATH . 'public/class-atr-public.php';

        /**
         *  
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-ajax.php';
    }

    private function set_languajes()
    {
        $atr_i18n = new ATR_i18n();
        $this->charger->add_action('after_setup_theme', $atr_i18n, 'load_theme_textdomain');
    }
    private function charger_instances()
    {
        /**
         * Crear instancia del cargador que utilzara para registrar los ganchos de wordpress
         */
        $this->charger                = new ATR_Charger();
        $this->atr_admin              = new ATR_Admin($this->get_theme_name(), $this->get_version());
        $this->atr_public             = new ATR_Public($this->get_theme_name(), $this->get_version());
        $this->atr_queries_ajax       = new ATR_QueriesAjax($this->get_theme_name(), $this->get_version());
    }

    private function define_admin_hooks()
    {
    }


    private function define_public_hooks()
    {
        $this->charger->add_action('wp_enqueue_scripts', $this->atr_public, 'enqueue_styles');
        $this->charger->add_action('wp_enqueue_scripts', $this->atr_public, 'enqueue_scripts');

        $this->charger->add_action('init', $this->atr_public, 'atr_menus_frontend');

        //registrar hook para ajax en el manejo de los filtros
        $this->charger->add_action('wp_ajax_get_filter_programs', $this->atr_queries_ajax, 'get_filter_programs');
        $this->charger->add_action('wp_ajax_nopriv_get_filter_programs', $this->atr_queries_ajax, 'get_filter_programs');
    }

    public function get_theme_name()
    {
        return $this->theme_name;
    }
    public function get_version()
    {
        return $this->version;
    }

    public function get_charger()
    {
        return $this->charger;
    }
    public function run()
    {
        return $this->charger->run();
    }
}
