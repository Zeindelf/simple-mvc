<?php

namespace Database;

use \PDO;
use Database\Conn;
use Helpers\Message;

/**
 * Classe Read
 * Realiza consultas no Banco de Dados.
 */
class Read extends Conn
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Query de seleção no Banco de Dados
	 * @var string
	 */
	private $select;

	/**
	 * Executa os bindValues
	 * @var string
	 */
	private $places;

	/**
	 * Resultado das seleções
	 * @var array
	 */
	private $result;

	/**
	 * Métodos da PDO
	 * @var PDOStatement
	 */
	private $read;

	/**
	 * Conexão com PDO
	 * @var PDO
	 */
	private $conn;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
     * Executa leituras no Banco de Dados.
     * Informe o nome da tabela, os termos da seleção e uma análize em cadeia (ParseString) para executar.
     *
     * @access public
     * @param string 	$table 			Nome da tabela
     * @param string 	$terms 			WHERE | ORDER | LIMIT :limit | OFFSET :offset
     * @param string 	$parseString 	link={$link}&link2={$link2}
     */
	public function executeRead($table, $terms = null, $parseString = null)
	{
		if (!empty($parseString)):
			parse_str($parseString, $this->places);
		endif;

		$this->select = 'SELECT * FROM ' . $table . ' ' . $terms;
		$this->execute();
	}

	/**
     * Executa a leitura de dados via query que deve ser montada manualmente para possibilitar seleção de multiplas tabelas em uma única query.
     *
     * @access public
     * @param string 	$query 			'SELECT * FROM {$tabela} WHERE id >= :id'
     * @param string 	$parseString 	link={$link}&link2={$link2}
     */
	public function completeRead($query, $parseString = null)
	{
		$this->select = (string) $query;
		if (!empty($parseString)):
			parse_str($parseString, $this->places);
		endif;

		$this->execute();
	}

	/**
     * Modifica links já existentes recorrentes do método ExecuteRead().
     * O método pode ser usado para atualizar com Stored Procedures, modificando apenas os valores da condição.
     * Use este método para editar múltiplas linhas.
     *
     * @access public
     * @param string 	$parseString 	id={$id}&...
     */
	public function setPlaces($parseString)
	{
		parse_str($parseString, $this->places);

		$this->execute();
	}

	/**
     * Retorna um array com todos os resultados obtidos.
     * Para obter um resultado específico, acesse pelo índice.
     *
     * getResult()['índiceDaPesquisa']['nomeDaColuna']
     * ['índiceDaPesquisa'] por default é um INT.
     *
     * @access public
     * @return array
     */
	public function getResult()
	{
		return $this->result;
	}

	/**
     * Retorna o número de registros encontrados pelo select.
     *
     * @access public
     * @return int
     */
	public function getRowCount()
	{
		return $this->read->rowCount();
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
		$this->read = $this->conn->prepare($this->select);
		$this->read->setFetchMode(PDO::FETCH_ASSOC);
	}

	/**
	 * Cria a sintaxe da query para o Prepared Statements.
	 *
	 * @access private
	 */
	private function getSyntax()
	{
		if ($this->places):
			foreach ($this->places as $key => $value):
				if ($key == 'limit' || $key == 'offset'):
					$value = (int) $value;
				endif;

				$this->read->bindValue(':' . $key, $value, ( is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR ));
			endforeach;
		endif;
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
			$this->getSyntax();
			$this->read->execute();
			$this->result = $this->read->fetchAll();
		} catch (PDOException $e) {
			$this->result = null;

			$msg = '<b>Erro ao Consultar:</b> ' . $e->getMessage();
			echo Message::get('danger', $msg, false);
		}
	}
}