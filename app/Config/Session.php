<?php

use Core\Config;

/**
 * Configurações das Sessões
 */
Config::set('session', [
	'token'    => CSRF_TOKEN,
	'user'     => USER_SESSION,
	'remember' => USER_REMEMBER,
]);