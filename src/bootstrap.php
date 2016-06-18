<?php

use Core\App;

use Helpers\Load;

/**
 * Inicia o buffering
 */
ob_start();

/**
 * Carrega as configurações gerais
 */
require_once APP_DIR . DS . 'Config.php';

/**
 * Seta a Timezone padrão
 */
date_default_timezone_set(DEFAULT_TIMEZONE);

/**
 * Carrega as configurações da classe Config
 */
$load = new Load;

/**
 * Inicia a aplicação
 */
$app = new App;