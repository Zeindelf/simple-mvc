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

/**
 * Cria os diretórios de cache do Smarty, caso não existam
 */
if ( !is_dir(SMARTY_PATH) ):
	mkdir(SMARTY_PATH);
endif;

if ( !is_dir(SMARTY_CACHE) ):
	mkdir(SMARTY_CACHE);
endif;

if ( !is_dir(SMARTY_COMPILE) ):
	mkdir(SMARTY_COMPILE);
endif;