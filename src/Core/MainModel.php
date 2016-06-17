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
	//	PROTECTED METHODS
	//------------------------------------------------------------

	/**
	 * Instância a classe Create
	 *
	 * @access protected
	 * @return object
	 */
	protected function newCreate()
	{
		return new \Database\Create;
	}

	/**
	 * Instância a classe Delete
	 *
	 * @access protected
	 * @return object
	 */
	protected function newDelete()
	{
		return new \Database\Delete;
	}

	/**
	 * Instância a classe Read
	 *
	 * @access protected
	 * @return object
	 */
	protected function newRead()
	{
		return new \Database\Read;
	}

	/**
	 * Instância a classe Update
	 *
	 * @access protected
	 * @return object
	 */
	protected function newUpdate()
	{
		return new \Database\Update;
	}
}