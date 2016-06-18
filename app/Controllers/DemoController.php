<?php

namespace App\Controllers;

use Core\MainController;

/**
 * Controller de demonstração
 */
class DemoController extends MainController
{
	public function indexAction()
	{
		$model = $this->model('Demo', 'Demo');

		return $this->view($this->getTemplate(), $model->getData());
	}
}