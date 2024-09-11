<?php

$atr_dir_path = (substr(get_template_directory(),     -1) === '/') ? get_template_directory()     : get_template_directory()     . '/';
$atr_dir_uri  = (substr(get_template_directory_uri(), -1) === '/') ? get_template_directory_uri() : get_template_directory_uri() . '/';

define('ATR_DIR_PATH', $atr_dir_path);
define('ATR_DIR_URI', $atr_dir_uri);

require_once ATR_DIR_PATH . 'includes/class-atr-master.php';

function atr_run_master()
{
    $atr_master = new ATR_Master;
    $atr_master->run();
}

atr_run_master();

function registrar_menus() {
    register_nav_menus( array(
        'menu_principal' => __( 'Menú Principal' ),
        'menu_secundario' => __( 'Menú Secundario' )
    ) );
}
add_action( 'after_setup_theme', 'registrar_menus' );
