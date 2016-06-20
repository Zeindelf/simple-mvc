<?php

use Core\Config;

/**
 * Configurações de Criptografia
 */
Config::set('hash', [
	'algo' => PASSWORD_BCRYPT,
	'cost' => 10,
]);