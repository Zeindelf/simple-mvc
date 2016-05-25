<?php

namespace Database;

use \PDO;
use Core\Config;
use Helpers\Message;

/**
 * Classe Conn
 *
 * Executa a conexão no banco de dados MySQL utilizando o Design Pattern Singleton
 * Este padrão garante a existência de apenas uma instância de uma classe
 */
abstract class Conn
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Retorna um objeto PDO
	 * Responsável pelo singleton
	 *
	 * @var object
	 */
	private static $instance;

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Conecta com o Banco de Dados com o Padrão de Projeto Singleton
	 *
	 * @access private
	 * @return object
	 */
	private static function getInstance()
	{
		$config = Config::get('database');

		try {
			if ( !isset(self::$instance) ):
				$dsn = $config['driver'] . ':host=' . $config['hostname'] . ';dbname=' . $config['database'];
				$options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
				self::$instance = new PDO($dsn, $config['username'], $config['password'], $options);
			endif;

		} catch ( PDOException $e ) {
			$msg = 	'<p>Falha na conexão com a Base de Dados.</p><p>' . $e->getMessage() . '</p>';
			echo Message::get('danger', $msg, false);
			die();
		}

		self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		return self::$instance;
	}

	/**
	 * Realiza a conexão com a Base de Dados.
	 *
	 * @access protected
	 * @return object
	 */
	protected static function getConn()
	{
		return self::getInstance();
	}
}