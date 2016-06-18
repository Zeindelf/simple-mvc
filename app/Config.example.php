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
 * BASE_CSS: 	Caminho base para aruivos CSS
 * BASE_JS: 	Caminho base para arquivos Javascript
 * SITE_NAME: 	Nome do site
 * SITE_DESC: 	Descrição do site
 */
define('BASE_URL', 'http://localhost/Projects/simple-mvc/public');
define('BASE_CSS', BASE_URL . '/assets/css');
define('BASE_JS', BASE_URL . '/assets/js');
define('SITE_NAME', 'Simple MVC');
define('SITE_DESC', '');


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
define('DB_NAME', 'simple_mvc');
define('DB_USER', 'root');
define('DB_PASS', '');


//------------------------------------------------------------
// Configurações gerais do sistema
// Aconselhável não mudá-las sem entender como e onde funcionam
//------------------------------------------------------------

/**
 * Constantes de configuração dos diretórios do Smarty
 */
define('SMARTY_PATH', ROOT_DIR . DS . 'storage' . DS . 'smarty' );
define('SMARTY_CONFIG', APP_DIR . DS . 'Config.php');
define('SMARTY_CACHE', SMARTY_PATH . DS . 'cache');
define('SMARTY_COMPILE', SMARTY_PATH . DS . 'templates_c');
define('SMARTY_TEMPLATES', ROOT_DIR . DS . 'resources' . DS . 'views' . DS . 'templates');


/**
 * Constantes de formatação das mensagens via classe Messages
 * Define os nomes de classes CSS que farão a formatação das mensagens
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