<?php

use Core\Config;

/**
 * Configurações dos Cookies
 */
Config::set('cookie', [
	'remember'  => USER_REMEMBER,
	'expiry'    => COOKIE_EXPIRY,
	'delimiter' => md5(ENCRYPT_KEY),
]);