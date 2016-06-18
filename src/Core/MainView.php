<?php

namespace Core;

use Core\Config;

/**
 * Classe responsável por enviar todos os dados necessários
 * para a renderização da view pelo Smarty
 */
class MainView
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Contém o nome da classe em que foi chamada a View
	 *
	 * @access private
	 * @var string
	 */
	private $className;

	/**
	 * Contém o nome do método em que foi chamada a View
	 *
	 * @access private
	 * @var string
	 */
	private $methodName;

	/**
	 * Contém o caminho para o template Smarty
	 *
	 * @access private
	 * @var string
	 */
	private $templatePath;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Seta todos os parâmetros necessários para a construção da view
	 *
	 * @param method 	$template 		Recebe o método do controller
	 * @param array 	$data 			Envia os dados recebidos para o Smarty
	 * @param array 	$partials 		Header/Footer personalizado
	 * @access public
	 * @return view
	 */
	public function __construct($template, array $data = null, array $partials = null)
	{
		$this->smartyInit();

		$this->setTplName($template);
		$this->methodName = $this->methodName ?: 'index';
		$this->templatePath = $this->className . DS . $this->methodName . '.tpl';

		if ( !is_null($data) ):
			foreach ( $data as $keys => $values ):
				$this->view->assign($keys, $values);
			endforeach;
		endif;

		$pathPartials = Config::get('smarty.template') . DS . 'partials' . DS . 'geral' . DS;

		if ( !is_null($partials) ):
			$partialHeader = $pathPartials . $partials[0] . '.tpl';
			$partialFooter = $pathPartials . $partials[1] . '.tpl';

			$this->view->display($partialHeader);
			$this->view->display($this->templatePath);
			$this->view->display($partialFooter);

			return true;
		endif;

		$mainHeader = $pathPartials . 'main-header.tpl';
		$mainFooter = $pathPartials . 'main-footer.tpl';

		$this->view->display($mainHeader);
		$this->view->display($this->templatePath);
		$this->view->display($mainFooter);
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Inicia e configura o Smarty
	 *
	 * @access private
	 * @return Smarty object
	 */
	private function smartyInit()
	{
		$config = Config::get('smarty');

		$this->view = new \Smarty;
		$this->view->setConfigDir($config['config']);
		$this->view->setCacheDir($config['cache']);
		$this->view->setTemplateDir($config['template']);
		$this->view->setCompileDir($config['compile']);

		return $this->view;
	}

	/**
	 * Recebe o backtrace e extrai o nome da classe e do método
	 * onde foi chamado para realizar a formatação automática
	 * dos dados que serão enviados ao Smarty
	 *
	 * Não é a melhor técnica utilizar um backtrace em produção,
	 * mas a nível de estudo para este MVC, é plausível
	 *
	 * @access private
	 * @param array $tpl 		Array do backtrance
	 */
	private function setTplName(array $tpl)
	{
		$this->methodName = $tpl[1]['function'];
		$this->className = $tpl[1]['class'];

		$this->setMethodName($this->methodName);
		$this->setClassName($this->className);
	}

	/**
	 * Seta o nome do método para ser informado automaticamente ao Smarty
	 *
	 * @access private
	 * @param string $methodName 		Nome do método em que foi chamado
	 * @return string
	 */
	private function setMethodName($methodName)
	{
		$this->methodName = preg_split('/(?=[A-Z])/', $this->methodName);
		array_pop($this->methodName);

		$this->methodName = implode('-', $this->methodName);
		$this->methodName = strtolower($this->methodName);
	}

	/**
	 * Seta o nome da classe para ser informado automaticamente ao Smarty
	 *
	 * @access private
	 * @param string $className 		Nome da classe em que foi chamado
	 * @return string
	 */
	private function setClassName($className)
	{
		$this->className = explode('\\', $this->className);
		$this->className = array_pop($this->className);
		$this->className = preg_split('/(?=[A-Z])/', $this->className);
		$this->className = array_filter($this->className);
		array_pop($this->className);

		$this->className = implode('-', $this->className);
		$this->className = strtolower($this->className);
	}
}