<?php

namespace Database;

use \PDO;
use Database\Conn;
use Helpers\Message;

/**
 * Realiza atualizações no Banco de Dados
 */
class Update extends Conn
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
	 * Condições dos termos na atualização
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
	 * Resultado das alterações
	 *
	 * @var boolean
	 */
	private $result;

	/**
	 * Métodos da PDO
	 *
	 * @var PDOStatement
	 */
	private $update;

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
     * Executa atualizações no Banco de Dados
     * Informe o nome da tabela, os dados a serem atualizados em um array, as condições
     * e a parseString com os valores das condições
     *
     * Não passe a parse string com o mesmo nome do campo se ele estiver para ser alterado
     * Se passar o mesmo nome, ele ainda fará a busca, porém, atribuirá o valor da parse string no campo
     *
     *** Exemplo do que não fazer: WHERE nome_tabela = :nome_tabela
     *** Caso seja um dado que não será atualizado (como um id), não há problema de ter o mesmo nome
     *
     * $data = [
     * 		'nomeDaColunaUm' 	=> 'valorUm',
     * 		'nomeDaColunaDois' 	=> 'valorDois',
     * 		...
     * ];
     *
     * @access public
     * @param string 	$table 			Nome da tabela
     * @param array 	$data 			Informe os dados em um array atribuitivo
     * @param string 	$terms 			WHERE coluna = :link AND.. OR..
     * @param string 	$parseString 	link={$link}&link2={$link2}&...
     * @return void
     */
	public function executeUpdate($table, array $data, $terms, $parseString)
	{
		$this->table = (string) $table;
		$this->data = $data;
		$this->terms = (string) $terms;

		parse_str($parseString, $this->places);

		$this->getSyntax();
		$this->execute();
	}

	/**
     * Modifica links já existentes recorrentes do método executeUpdate()
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
     * Retorna o número de linhas alteradas na tabela
     *
     * @access public
     * @return int
     */
	public function getRowCount()
	{
		return $this->update->rowCount();
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
		$this->update = $this->conn->prepare($this->update);
	}

	/**
	 * Cria a sintaxe da query
	 *
	 * @access private
	 * @return void
	 */
	private function getSyntax()
	{
		foreach ($this->data as $key => $value) {
			$places[] = $key . ' = :' . $key;
		}

		$places = implode(', ', $places);
		$this->update = 'UPDATE ' . $this->table . ' SET ' . $places . ' ' . $this->terms;
	}

	/**
	 * Obtém a conexão com a Base de Dados e executa a query
	 *
	 * @access private
	 * @return void
	 */
	private function execute()
	{
		$this->connect();

		try {
			$this->update->execute(array_merge($this->data, $this->places));
			$this->result = true;
		} catch (PDOException $e) {
			$this->result = null;

			$message = '<b>Erro ao Alterar:</b> ' . $e->getMessage();
			echo Message::get('danger', $message, false);
		}
	}
}