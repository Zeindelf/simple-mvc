<?php

namespace Core;

/**
 * Classe principal do Models
 * Todas os Models contidos em /app/Models devem extender esta
 * Contém todos os métodos referentes ao Banco de Dados
 */
class MainModel
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Contém a instância Create do Banco de Dados
	 *
	 * @access protected
	 * @var object
	 */
	protected $create;

	/**
	 * Contém a instância Delete do Banco de Dados
	 *
	 * @access protected
	 * @var object
	 */
	protected $delete;

	/**
	 * Contém a instância Read do Banco de Dados
	 *
	 * @access protected
	 * @var object
	 */
	protected $read;

	/**
	 * Contém a instância Update do Banco de Dados
	 *
	 * @access protected
	 * @var object
	 */
	protected $update;

	//------------------------------------------------------------
	//	PROTECTED METHODS
	//------------------------------------------------------------

	/**
	 * Instância a classe Create
	 *
	 * @access protected
	 * @return object
	 */
	protected function getCreate()
	{
		$this->create = new \Database\Create;
		return $this->create;
	}

	/**
	 * Instância a classe Delete
	 *
	 * @access protected
	 * @return object
	 */
	protected function getDelete()
	{
		$this->delete = new \Database\Delete;
		return $this->delete;
	}

	/**
	 * Instância a classe Read
	 *
	 * @access protected
	 * @return object
	 */
	protected function getRead()
	{
		$this->read = new \Database\Read;
		return $this->read;
	}

	/**
	 * Instância a classe Update
	 *
	 * @access protected
	 * @return object
	 */
	protected function getUpdate()
	{
		$this->update = new \Database\Update;
		return $this->update;
	}
}