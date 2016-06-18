<?php

define('DS', DIRECTORY_SEPARATOR);

/**
 * Caminhos absolutos
 */
define('ROOT_DIR', realpath(__DIR__ . '/../'));
define('APP_DIR', realpath(__DIR__ . '/../app/'));
define('SRC_DIR', realpath(__DIR__ . '/../src/'));
define('PUBLIC_DIR', realpath(__DIR__));

/**
 * Verifica e carrega o autoload do Composer
 */
if ( file_exists(ROOT_DIR . DS . 'vendor' . DS . 'autoload.php') ):
    require_once ROOT_DIR . DS . 'vendor' . DS . 'autoload.php';
else:
    include_once ROOT_DIR . DS . 'misc' . DS . 'warnings' . DS . 'missing-composer.php';
    die();
endif;

/**
 * Checa se existe o arquivo de configuração
 */
if ( !is_readable(APP_DIR . DS .'Config.php') ):
    include_once ROOT_DIR . DS . 'misc' . DS . 'warnings' . DS . 'missing-config.php';
    die();
endif;

/**
 * Inicializa toda a aplicação
 */
require_once SRC_DIR . DS . 'bootstrap.php';