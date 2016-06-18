<?php

use Core\Config;

/**
 * Configurações do Smarty
 */
Config::set('smarty', [
	'config'   => SMARTY_CONFIG,
	'cache'    => SMARTY_CACHE,
	'template' => SMARTY_TEMPLATES,
	'compile'  => SMARTY_COMPILE
]);