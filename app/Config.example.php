<?php

//------------------------------------------------------------
// Configurações gerais
//------------------------------------------------------------

/**
 * Configura a timezone
 */
define('DEFAULT_TIMEZONE', 'America/Sao_Paulo');


/**
 * Definições base
 *
 * BASE_URL: 	URL base do site
 * BASE_CSS: 	Caminho base para arquivos CSS
 * BASE_JS: 	Caminho base para arquivos Javascript
 * SITE_NAME: 	Nome do site
 * SITE_DESC: 	Descrição do site
 */
define('BASE_URL', 'http://localhost/Projects/simple-mvc');
define('BASE_CSS', BASE_URL . '/assets/css');
define('BASE_JS', BASE_URL . '/assets/js');
define('SITE_NAME', 'Simple MVC');
define('SITE_DESC', '');


/**
 * Define a chave de criptografia para Cookies e recuperação de senha
 */
define('ENCRYPT_KEY', 'RandomKey');


/**
 * Define a quantidade de tentativas que um usuário terá ao realizar o login e falhar
 */
define('LOGIN_ATTEMPTS', 5);


/**
 * Define em quanto tempo o código de recuperação de senha irá expirar
 * Preferencialmente, informar em horas inteiras (4 horas | 60m * 4h)
 */
define('TOKEN_EXPIRE', 60 * 4);


/**
 * Configuração de conexão ao Banco de Dados
 *
 * DB_TYPE: Database utilizado - MySQL por padrão
 * DB_HOST: Servidor da Base de Dados. Quando em servidor local, costuma ser '127.0.0.1' ou 'localhost'
 * DB_NAME: Nome do Banco da Dados
 * DB_USER: Usuário do Banco da Dados. O usuário precisa ter permissão para executar SELECT, UPDATE, DELETE e INSERT
 * DB_PASS: Senha do usuário
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');


/**
 * Servidor de E-mail
 *
 * MAIL_HOST: 		Servidor de e-mail (Gmail por padrão)
 * MAIL_PORT: 		Porta de envio (587 - antispam para SMTP)
 * MAIL_USER: 		Usuário de e-mail (email@dominio.com.br)
 * MAIL_PASS: 		Senha do usuário de e-mail
 * MAIL_AUTH: 		Autenticação SMTP
 * MAIL_SECURY: 	Segurança SMTP (false para nenhuma, 'tls' para Hotmail e Gmail)
 * MAIL_HTML: 		Permitido uso de HTML nos e-mails enviados
 */
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT', '587');
define('MAIL_USER', '');
define('MAIL_PASS', '');
define('MAIL_SECURE', 'tls');

define('MAIL_FROM_ADDRESS', '');
define('MAIL_FROM_NAME', '');


/**
 * Define sessões padrões
 *
 * CSRF_TOKEN: 			Nome do token para proteção contra CSRF
 * USER_SESSION: 		Sessão de usuários
 * USER_REMEMBER: 		Lembrar os dados do usuário
 * COOKIE_EXPIRY: 		Tempo de vida do Cookie (30 dias | 60s * 60m * 24h * 30d)
 */
define('CSRF_TOKEN', '_token');
define('USER_SESSION', 'userSession');
define('USER_REMEMBER', 'userRemember');
define('COOKIE_EXPIRY', 60 * 60 * 24 * 30);


//------------------------------------------------------------
// Configurações gerais do sistema
// Aconselhável não mudá-las sem entender como e onde funcionam
//------------------------------------------------------------

/**
 * Constantes de configuração dos diretórios do Smarty na aplicação
 */
define('SMARTY_PATH', ROOT_DIR . DS . 'storage' . DS . 'smarty' );
define('SMARTY_CONFIG', APP_DIR . DS . 'Config.php');
define('SMARTY_CACHE', SMARTY_PATH . DS . 'cache');
define('SMARTY_COMPILE', SMARTY_PATH . DS . 'templates_c');
define('SMARTY_TEMPLATES', ROOT_DIR . DS . 'resources' . DS . 'views' . DS . 'templates');
define('SMARTY_EMAIL', ROOT_DIR . DS . 'resources' . DS . 'views' . DS . 'templates' . DS . 'email' . DS);


/**
 * Constantes de formatação das mensagens
 * Define os nomes de classes CSS que farão a formatação das mensagens
 * Estão setadas para o caso de se usar o Bootstrap
 *
 * MSG_SUCCES:	Apresenta uma mensagem de sucesso ao usuário 	[ cor: verde ]
 * MSG_INFO:	Apresenta uma informação ao usuário 			[ cor: azul ]
 * MSG_WARNING:	Apresenta um aviso ao usuário 					[ cor: amarelo ]
 * MSG_DANGER:	Apresenta um erro ao usuário 					[ cor: vermelho ]
 */
define('MSG_SUCCESS',	'alert-success');
define('MSG_INFO',		'alert-info');
define('MSG_WARNING',	'alert-warning');
define('MSG_DANGER',	'alert-danger');