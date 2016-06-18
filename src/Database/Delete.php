<?php

namespace Database;

use \PDO;
use Database\Conn;
use Helpers\Message;

/**
 * Realiza exclusões no Banco de Dados
 */
class Delete extends Conn
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
	 * Condições dos termos na exclusão de dados
	 *
	 * @var string
	 */
	private $terms;

	/**
	 * Executa os bindValues e manipula as parseStrings
	 *
	 * @var string
	 */
	private $places;

	/**
	 * Resultado das exclusões
	 *
	 * @var boolean
	 */
	private $result;

	/**
	 * Métodos da PDO
	 *
	 * @var PDOStatement
	 */
	private $delete;

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
     * Executa exclusões no Banco de Dados
     * Informe o nome da tabela, as condições e a parseString referente às condições
     *
     * @access public
     * @param string 	$table 			Nome da tabela
     * @param string 	$terms 			WHERE coluna = :link
     * @param string 	$parseString 	link={$link}&link2={$link2}&...
     * @return void
     */
	public function executeDelete($table, $terms, $parseString)
	{
		$this->table = (string) $table;
		$this->terms = (string) $terms;

		parse_str($parseString, $this->places);

		$this->getSyntax();
		$this->execute();
	}

	/**
     * Modifica links já existentes recorrentes do método executeDelete()
	 * Modifique apenas os valores da condição para re-executar
     *
     * @access public
     * @param string 	$parseString 	link3={$link3}&...
     * @return void
     */
	public function setPlaces($parseString)
	{
		parse_str($parseString, $this->places);

		$this->getSyntax();
		$this->execute();
	}

	/**
     * Retorna true se não ocorrer erros
     * O retorno será true mesmo que os dados não sejam alterados e a query seja executada com sucesso
     * Para verificar alterações, execute o getRowCount()
     *
     * @access public
     * @return boolean
     */
	public function getResult()
	{
		return $this->result;
	}

	/**
     * Retorna o número de linhas afetadas no banco
     *
     * @access public
     * @return int
     */
	public function getRowCount()
	{
		return $this->delete->rowCount();
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
		$this->delete = $this->conn->prepare($this->delete);
	}

	/**
	 * Cria a sintaxe da query
	 *
	 * @access private
	 * @return void
	 */
	private function getSyntax()
	{
		$this->delete = 'DELETE FROM ' . $this->table . ' ' . $this->terms;
	}

	/**
	 * Obtém a conexão com o Banco de Dados e executa a query
	 *
	 * @access private
	 * @return void
	 */
	private function execute()
	{
		$this->connect();

		try {
			$this->delete->execute($this->places);
			$this->result = true;
		} catch (PDOException $e) {
			$this->result = null;

			$message = '<b>Erro ao Excluir:</b> ' . $e->getMessage();
			echo Message::get('danger', $message, false);
		}
	}
}