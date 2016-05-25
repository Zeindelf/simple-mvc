<?php

namespace Database;

use \PDO;
use Database\Conn;
use Helpers\Message;

/**
 * Classe Delete
 * Realiza exclusões no Banco de Dados.
 */
class Delete extends Conn
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Tabela do Banco de Dados
	 * @var string
	 */
	private $table;

	/**
	 * Condições dos termos na exclusão de dados
	 * @var string
	 */
	private $terms;

	/**
	 * Executa os bindValues e manipula as ParseStrings
	 * @var string
	 */
	private $places;

	/**
	 * Resultado das exclusões
	 * @var boolean
	 */
	private $result;

	/**
	 * Métodos da PDO
	 * @var PDOStatement
	 */
	private $delete;

	/**
	 * Conexão com PDO
	 * @var PDO
	 */
	private $conn;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
     * Executa exclusões no Banco de Dados.
     * Informe o nome da tabela, o dado a ser excluído e uma parseString para executar.
     *
     * @access public
     * @param string 	$table 			Nome da tabela
     * @param string 	$terms 			WHERE coluna = :coluna
     * @param string 	$parseString 	link={$link}&link2={$link2}
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
     * Modifica links já existentes recorrentes do método ExecuteDelete().
     * O método pode ser usado para atualizar com Stored Procedures, modificando apenas os valores da condição.
     * Use este método para editar múltiplas linhas.
     *
     * @access public
     * @param string 	$parseString 	id={$id}&...
     */
	public function setPlaces($parseString)
	{
		parse_str($parseString, $this->places);

		$this->getSyntax();
		$this->execute();
	}

	/**
     * Retorna true se não ocorrer erros, caso contrário, false.
     * O retorno será true mesmo que os dados não sejam alterados e a query seja executada com sucesso.
     * Para verificar alterações, execute o getRowCount();
     *
     * @access public
     * @return boolean
     */
	public function getResult()
	{
		return $this->result;
	}

	/**
     * Retorna o número de linhas alteradas no banco.
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
	 */
	private function connect()
	{
		$this->conn = parent::getConn();
		$this->delete = $this->conn->prepare($this->delete);
	}

	/**
	 * Cria a sintaxe da query para o Prepared Statements.
	 *
	 * @access private
	 */
	private function getSyntax()
	{
		$this->delete = 'DELETE FROM ' . $this->table . ' ' . $this->terms;
	}

	/**
	 * Obtém a conexão com a Base de Dados e executa a query
	 *
	 * @access private
	 */
	private function execute()
	{
		$this->connect();

		try {
			$this->delete->execute($this->places);
			$this->result = true;
		} catch (PDOException $e) {
			$this->result = null;

			$msg = '<b>Erro ao Excluir:</b> ' . $e->getMessage();
			echo Message::get('danger', $msg, false);
		}
	}
}