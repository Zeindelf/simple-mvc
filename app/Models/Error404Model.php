<?php

namespace App\Models;

use Core\MainModel;

/**
 * Modelo da página de Erro 404
 */
class Error404Model extends MainModel
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Dados que serão enviados para o Controller abastecer a View
	 *
	 * @access private
	 * @var array
	 */
	private $data;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Obtém os dados tratados
	 *
	 * @access public
	 * @return array
	 */
	public function getData()
	{
		$this->setData();

		return $this->data;
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Seta o array com as informações necessárias
	 *
	 * @access private
	 * @return array
	 */
	private function setData()
	{
		$this->data = [
			'variables' => [
				'headerTitle' => 'Erro 404',
				'errorTitle'  => 'Error 404',
				'errorDesc'   => 'Oppsss! Página não encontrada!'
			]
		];
	}
}