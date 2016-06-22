<?php

namespace Core;

use Core\Redirect;

/**
 * Classe principal onde é feito todo o tratamento das requisições
 * HTTP, assim como seus padrões de nomenclaturas
 */
class App
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Responsável pelo objeto
	 *
	 * @access protected
	 * @var object
	 */
	protected $controller;

	/**
	 * Responsável pelo método do objeto Controller
	 *
	 * @access protected
	 * @var method
	 */
	protected $method;

	/**
	 * Parâmetros passados nos métodos
	 *
	 * @access protected
	 * @var mix
	 */
	protected $params;

	/**
	 * Array contendo toda a URL informada
	 *
	 * @access private
	 * @var array
	 */
	private $url;

	/**
	 * Apoio para o controller de Erro 404
	 *
	 * @access private
	 * @var boolean
	 */
	private $result;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Faz todo o controle da aplicação quando instanciada a classe
	 *
	 * @access public
	 * @return URL
	 */
	public function __construct()
	{
		$this->parseUrl();
		$this->setController();

		if ( $this->result ):
			$this->setMethod();
		endif;
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Separa as URL passadas em um array para uso dos controllers e métodos
	 *
	 * @access private
	 * @return string
	 */
	private function parseUrl()
	{
		$this->url = strip_tags(trim(filter_input(INPUT_GET, 'uri', FILTER_DEFAULT)));
		$this->url = $this->url ?: 'index';

		if ( isset($this->url) ):
			$this->url = rtrim($this->url, '/');
			$this->url = explode('/', $this->url);
		endif;

		return $this->url;
	}

	/**
	 * Realiza todo o tratamento dos controllers passados por URL,
	 * tais como existência, nomenclaturas e redirecionamentos
	 *
	 * @access private
	 * @return object
	 */
	private function setController()
	{
		$verify = strpos($this->url[0], '-');

		if ( $verify ):
			$this->url[0] = $this->setUrl($this->url[0]);
		else:
			$this->url[0] = ucfirst(strtolower($this->url[0]));
		endif;

		$this->url[0] .= 'Controller';

		if ( file_exists('../app/Controllers/' . $this->url[0] . '.php') ):
			$this->controller = $this->url[0];
			unset($this->url[0]);
		else:
			$this->setPageNotFound();
			return $this->result;
		endif;

		$this->controller = 'App\\Controllers\\' . $this->controller;
		$this->controller = new $this->controller;

		$this->result = true;
	}

	/**
	 * Realiza todo o tratamento dos métodos passados por URL,
	 * tais como existência, nomenclaturas e redirecionamentos
	 *
	 * @access private
	 * @return method
	 */
	private function setMethod()
	{
		if ( isset($this->url[1]) ):
			$verify = strpos($this->url[1], '-');

			if ( $verify ):
				$this->url[1] = $this->setUrl($this->url[1]);
				$this->url[1] = lcfirst($this->url[1]);
			endif;

			$this->url[1] .= 'Action';

			if ( method_exists($this->controller, $this->url[1]) ):
				$this->method = $this->url[1];
				unset($this->url[1]);
			elseif ( get_class($this->controller) === 'App\Controllers\Error404Controller' ):
				return false;
			else:
				$this->setPageNotFound();
				return $this->result;
			endif;
		endif;

		$this->method = $this->method ?: 'indexAction';
		$this->params = $this->url ? array_values($this->url) : [];
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	/**
	 * Transforma uma url composta separada por hífen em uma string UpperCamelCase
	 * para os Controllers e os Métodos. Os métodos por sua vez são convertidos
	 * para lowerCamelCase onde for requisitado
	 *
	 * @access private
	 * @param string $url
	 * @return string
	 */
	private function setUrl($url)
	{
		if ( substr($url, -1) === '-' ):
			$this->setPageNotFound();
			return $this->result;
		endif;

		$url = explode('-', strtolower($url));
		$url = implode(array_map('ucfirst', $url));

		return $url;
	}

	/**
	 * Página de Erro 404 quando não existirem Controllers e/ou Métodos
	 * correspondentes. Também é chamada quando um Controller não possuir
	 * o método indexAction()
	 *
	 * @access private
	 * @return object
	 */
	private function setPageNotFound()
	{
		$this->result = false;

		return Redirect::to(404);
	}
}