<?php

use Core\Config;

/**
 * Configurações de tentativas de login
 */
Config::set('login', [
	'attempts' => LOGIN_ATTEMPTS,
]);