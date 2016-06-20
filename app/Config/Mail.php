<?php

use Core\Config;

/**
 * Configurações do servidor de e-mail
 */
Config::set('mail', [
	'host'     => MAIL_HOST,
	'port'     => MAIL_PORT,
	'username' => MAIL_USER,
	'password' => MAIL_PASS,
	'from'     => [
		'address' => MAIL_FROM_ADDRESS,
		'name'    => MAIL_FROM_NAME,
	],
	'auth'     => true,
	'secure'   => MAIL_SECURE,
	'html'     => true,
	'charset'  => 'utf-8',
]);