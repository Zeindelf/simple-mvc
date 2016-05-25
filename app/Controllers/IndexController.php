<?php

namespace App\Controllers;

use Core\MainController;

/**
 * Controller de apresentação da página principal do site
 */
class IndexController extends MainController
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Página principal do site, acessada por:
	 * dominio.com/
	 *
	 * @access public
	 * @return view
	 */
	public function indexAction()
	{
		$model = $this->model('Index');

		$this->view($this->getTemplate(), $model->getData());
	}
}