<?php

namespace App\Controllers;

use Core\MainController;

/**
 * Classe de exemplo do comportamento de uma URI composta de duas
 * ou mais palavras
 */
class ExemploUrlCompostaController extends MainController
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Modo como a URL será apresentada:
	 * dominio.com/exemplo-url-composta
	 *
	 * @access public
	 * @return view
	 */
	public function indexAction()
	{
		$model = $this->model('ExemploUrlComposta');

		$this->view($this->getTemplate(), $model->getData());
	}

	/**
	 * Modo como a URL será apresentada:
	 * dominio.com/exemplo-url-composta/exemplo-metodo-composto
	 *
	 * @access public
	 * @return view
	 */
	public function exemploMetodoCompostoAction()
	{
		$model = $this->model('ExemploMetodoComposto');

		$this->view($this->getTemplate(), $model->getData());
	}

	/**
	 * Modo como a URL seria apresentada caso não fosse feito o redirecionamento:
	 * dominio.com/exemplo-url-composta/exemplo-redirect
	 *
	 * Fará o redirecionamento para a index quando acessado
	 *
	 * @access public
	 * @return redirect
	 */
	public function exemploRedirectAction()
	{
		// Algum processamento

		$this->redirect('index');
	}
}