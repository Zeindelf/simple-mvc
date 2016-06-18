<?php

use Core\Config;

/**
 * Configurações do Banco de Dados
 */
Config::set('database', [
	'driver'    => DB_TYPE,
    'hostname'  => DB_HOST,
    'database'  => DB_NAME,
    'username'  => DB_USER,
    'password'  => DB_PASS,
]);