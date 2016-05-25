<?php

namespace App\Controllers;

use Core\MainController;

/**
 * Controller para requisições Not Found - 404
 */
class Error404Controller extends MainController
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Apresenta automaticamente a página 404 quando instanciada
	 *
	 * @access public
	 * @return view error404
	 */
	public function __construct()
	{
		$model = $this->model('Error404');

		$this->view($this->getTemplate(), $model->getData());
	}

	/**
	 * Index padrão de um controller
	 *
	 * @return none
	 */
	public function indexAction()
	{
	}
}