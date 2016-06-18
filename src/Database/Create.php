<?php

namespace Database;

use \PDO;
use Database\Conn;
use Helpers\Message;

/**
 * Realiza cadastros no Banco de Dados
 */
class Create extends Conn
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Tabela do Banco de Dados
	 *
	 * @var string
	 */
	private $table;

	/**
	 * Dados a serem inseridos
	 *
	 * @var array
	 */
	private $data;

	/**
	 * Resultado informando o cadastro
	 *
	 * @var int
	 */
	private $result;

	/**
	 * Métodos da PDO
	 *
	 * @var PDOStatement
	 */
	private $create;

	/**
	 * Conexão com PDO
	 *
	 * @var PDO
	 */
	private $conn;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Executa inserções no Banco de Dados
	 * Informe o nome da tabela e os dados a serem inseridos em um array com
	 * o nome da coluna e valor
	 *
	 * $data = [
     * 		'nomeDaColunaUm' 	=> 'valorUm',
     * 		'nomeDaColunaDois' 	=> 'valorDois',
     * 		...
     * ];
	 *
	 * @access public
	 * @param string 	$table 		Informe o nome da tabela
	 * @param array 	$data 		Informe um array atribuitivo
	 */
	public function executeCreate($table, array $data)
	{
		$this->table = (string) $table;
		$this->data = $data;

		$this->getSyntax();
		$this->execute();
	}

	/**
     * Retorna o ID do último registro inserido ou false caso a inserção falhe
     *
     * @access public
     * @return int|boolean
     */
	public function getResult()
	{
		return $this->result;
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Obtém o PDO e prepara a query
	 *
	 * @access private
	 * @return void
	 */
	private function connect()
	{
		$this->conn = parent::getConn();
		$this->create = $this->conn->prepare($this->create);
	}

	/**
	 * Cria a sintaxe da query
	 *
	 * @access private
	 * @return void
	 */
	private function getSyntax()
	{
		$fields = implode(', ', array_keys($this->data));
		$places = ':' . implode(', :', array_keys($this->data));

		$this->create = 'INSERT INTO ' . $this->table . ' ( ' . $fields . ' ) VALUES ( ' . $places . ' )';
	}

	/**
	 * Obtém a conexão com o Banco de Dados e executa a query
	 *
	 * @access private
	 * @return mix
	 */
	private function execute()
	{
		$this->connect();

		try {
			$this->create->execute($this->data);
			$this->result = $this->conn->lastInsertId();
		} catch (PDOException $e) {
			$this->result = null;

			$message = '<b>Erro ao Cadastrar:</b> ' . $e->getMessage();
			echo Message::get('danger', $message, false);
		}
	}
}