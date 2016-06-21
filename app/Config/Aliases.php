<?php

use Core\Config;

/**
 * Configurações dos aliases
 */
Config::set('classAliases', [
	'Csrf'    => '\Helpers\Csrf',
	'Flash'   => '\Helpers\Flash',
	'Http'    => '\Helpers\Http',
	'Message' => '\Helpers\Message',
	'Session' => '\Helpers\Session',
]);