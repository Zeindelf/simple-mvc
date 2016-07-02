<?php

namespace Database;

use \PDO;
use Core\Config;
use Helpers\Message;

/**
 * Realiza a conexão com o Banco de Dados
 * Utiliza o Design Pattern Singleton
 */
abstract class Conn
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Responsável pelo singleton
	 *
	 * @var object
	 */
	private static $instance;

	//------------------------------------------------------------
	//	PROTECTED METHODS
	//------------------------------------------------------------

	/**
	 * Realiza a conexão com o Banco de Dados.
	 *
	 * @access protected
	 * @return object
	 */
	protected static function getConn()
	{
		return self::getInstance();
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Conecta com o Banco de Dados
	 *
	 * @access private
	 * @return object
	 */
	private static function getInstance()
	{
		try {
			if ( !isset(self::$instance) ) {
				$dsn = Config::get('database.driver') . ':host=' . Config::get('database.hostname') . ';dbname=' . Config::get('database.database');
				$options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
				self::$instance = new PDO($dsn, Config::get('database.username'), Config::get('database.password'), $options);
			}

		} catch ( PDOException $e ) {
			$message = 	'<p>Falha na conexão com a Base de Dados.</p><p>' . $e->getMessage() . '</p>';
			echo Message::get('danger', $message, false);
			die();
		}

		self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		return self::$instance;
	}
}