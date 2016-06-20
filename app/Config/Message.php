<?php

use Core\Config;

/**
 * Configurações das mensagens do sistema
 *
 * Melhor entendimento de uso dos coringas %n% é encontrado no
 * método estático message() da classe /Core/Config
 */
Config::set('message', [
	//------------------------------------------------------------
	// Sistema
	//------------------------------------------------------------
	'system' => [
		'error' => '<h2>Oppsss, ocorreu um problema!</h2><p>Contate um administrador ou tente mais tarde.</p>',
	],

	//------------------------------------------------------------
	// Contato
	//------------------------------------------------------------
	'contact' => [
		'success' => '<h2>Sucesso!</h2><p>Sua mensagem foi enviada.</p>',
	],

	//------------------------------------------------------------
	// CSRF
	//------------------------------------------------------------
	'csrf' => '<h2>Oppsss! Você não tem a confirmação do formulário.</h2>
				<p>Você não está vindo de onde deveria. Recarregue a página e tente novamente.</p>
				<p>Se o erro persistir, contate um administrador.</p>',

	//------------------------------------------------------------
	// Login
	//------------------------------------------------------------
	'login' => [
		'invalid' => '<h2>Erro ao logar:</h2><p>Usuário e/ou senha inválido(s).</p>',
		'alert'   => '<h2>Alerta!</h2><p>Você só possui mais <b>1</b> tetantiva de login.</p><p>Parece que você esqueceu sua senha. Deseja solicitar uma nova?</p>',
		'warning' => '<h2>Aviso!</h2> Você possui mais <b>%1%</b> tentativas de login.</p>',
	],

	//------------------------------------------------------------
	// Boas-vindas
	//------------------------------------------------------------
	'welcome' => [
		'nameless' => '<h2>Logado com sucesso!</h2><br><p>Seja bem vindo(a), <b>%1%</b>.</p><p>Atualize os seus dados!</p><p>Ir para a <a href="%2%"><b>Meu Profile</b></a>!</p>',
		'fullname' => '<h2>Logado com sucesso!</h2><br><p>Seja bem vindo(a) <b>%1% %2%</b>.</p>',
	],

	//------------------------------------------------------------
	// Logout
	//------------------------------------------------------------
	'logout' => '<p>Você foi deslogado!</p>',

	//------------------------------------------------------------
	// Senhas
	//------------------------------------------------------------
	'password' => [
		// Troca
		'change' => [
			'invalid' => '<h2>Senha atual inválida!</h2><p>Insira sua senha corretamente.</p>',
			'success' => '<h2>Parabéns!</h2><p>Sua senha foi redifinida com sucesso.</p>',
		],

		// Recuperação
		'recover' => [
			'invalid' => '<h2>Usuário não cadastrado</h2><p>Insira seu e-mail corretamente.</p>',
			'success' => '<h2>Sucesso!</h2><p>Um link com as informações para recuperar sua senha foi enviado para seu e-mail.</p><p>Por favor, cheque sua caixa de entrada e lixo eletrônico!</p>',
		],

		// Redefinição
		'reset' => [
			'success' => '<h2>Parabéns!</h2><p>Sua nova senha foi redefinida com sucesso.</p>',
		],
	],

	//------------------------------------------------------------
	// Cadastro
	//------------------------------------------------------------
	'register' => [
		'success' => '<h2>Parabéns!</h2><p>Cadastrado efetuado com sucesso.</p><p>Por favor, efetue o login.</p>',
	],

	//------------------------------------------------------------
	// Usuário
	//------------------------------------------------------------
	'user' => [
		// Bloqueio da conta
		'block' => '<h2>Erro ao logar</h2><p>Sua conta foi bloqueada pois excedeu a quantidade máxima de tentativas de login.</p>
					<p><b><a href="%1%">Clique aqui</a></b> para receber um e-mail com as instruções para recuperar sua conta.</p>',

		// Solicitação de desbloqueio
		'unblock' => [
			'success' => '<h2>Sucesso!</h2><p>Um e-mail contendo as informações necessárias para você recuperar sua conta foi enviado para o endereço de e-mail cadastrado.</p>',
		],

		// Desbloquear
		'recover' => [
			'invalid' => '<h2>Oppsss!</h2><p>Este não é o seu endereço de e-mail.</p>',
			'success' => '<h2>Parabéns!</h2><p>Sua conta foi desbloqueada com sucesso.</p>',
		],

		// Atualizar
		'update' => [
			'success' => '<h2>Sucesso!</h2><p>Seus dados foram atualizados.</p>',
		],
	],
]);