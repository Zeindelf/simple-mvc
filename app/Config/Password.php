<?php

use Core\Config;

/**
 * Configurações da recuperação de senha
 */
Config::set('password', [
	'delimiter' => md5(ENCRYPT_KEY),
	'expire'    => TOKEN_EXPIRE,
]);