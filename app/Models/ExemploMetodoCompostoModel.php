<?php

namespace App\Models;

use Core\MainModel;

/**
 * Modelo da página de Método Composto
 */
class ExemploMetodoCompostoModel extends MainModel
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
				'headerTitle'           => 'Método Composto',
				'titleMetodoComposto'   => 'Título do Método Composto',
				'exemploMetodoComposto' => 'dominio.com/exemplo-url-composta/exemplo-metodo-composto',
			],
		];
	}
}