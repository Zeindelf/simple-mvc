<?php

use Core\App;

use Helpers\Load;
use Helpers\Session;

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
 * Inicia as sessões
 */
Session::init();

/**
 * Inicia a aplicação
 */
$app = new App;

/**
 * Sessões temporárias
 *
 * Deleta a sessão de Flash Message
 */
Session::delete('flash');