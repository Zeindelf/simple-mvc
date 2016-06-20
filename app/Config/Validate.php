<?php

use Core\Config;

/**
 * Configurações da validação do registro de usuário
 */
Config::set('validate', [
	//------------------------------------------------------------
	// Usuário
	//------------------------------------------------------------
	'user' => [
		// Nome de usuário
		'minUsername' => 3,
		'maxUsername' => 30,

		// E-mail
		'maxEmail' => 80,

		// Senha
		'minPassword' => 6,
		'maxPassword' => 30,

		// Nome
		'minFirstname' => 2,
		'maxFirstname' => 20,

		// Sobrenome
		'minLastname' => 2,
		'maxLastname' => 80,
	],

	//------------------------------------------------------------
	// Contato
	//------------------------------------------------------------
	'contact' => [
		// Nome
		'minName' => 2,
		'maxName' => 80,

		// E-mail
		'maxEmail' => 80,

		// Assunto
		'minSubject' => 3,
		'maxSubject' => 100,

		// Mensagem
		'minMessage' => 10,
		'maxMessage' => 1000,
	],
]);