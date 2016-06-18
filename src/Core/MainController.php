<?php

namespace Core;

use App\Controllers\Error404Controller;

/**
 * Classe principal do Controller
 * Todas os Controllers contidos em /app/Controllers devem extender esta
 */
class MainController
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Instancia o Model requisitado
	 *
	 * @access private
	 * @var string
	 */
	private $model;

	/**
	 * Instancia a View requisitada
	 *
	 * @access protected
	 * @var string
	 */
	protected $view;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Retorna página de Erro 404 quando não existir o método
	 * indexAction() nos controllers
	 *
	 * @access public
	 * @return object
	 */
	public function indexAction()
	{
		return new Error404Controller;
	}

	//------------------------------------------------------------
	//	PROTECTED METHODS
	//------------------------------------------------------------

	/**
	 * Carrega o Model para requisição e tratamento dos dados
	 *
	 * @access protected
	 * @param string 	$model 		Nome do Model requisitado
	 * @param string 	$dir 		Nome do diretório, caso exista
	 * @return object
	 */
	protected function model($model, $dir = null)
	{
		$this->model = $model;
		$this->model = ucfirst(strtolower($this->model));

		if ( !is_null($dir) ):
			$dir = ucfirst(strtolower($dir));
			$this->model = 'App\\Models\\' . $dir . '\\' . $this->model . 'Model';
		else:
			$this->model = 'App\\Models\\' . $this->model . 'Model';
		endif;

		return new $this->model;
	}

	/**
	 * Prepara os dados iniciais para a classe View fazer a renderização
	 * para o Smarty Template Engine
	 *
	 * ----------------------------------------------------------------------------
	 * Ao informar os dados a serem passados pelo array $data, para a renderização
	 * no Smarty, eles estarão disponíveis em variáveis com o mesmo nome do primeiro
	 * índice do array $data informado no Model
	 * Se por exemplo, você possui:
	 *
	 * $data = [
	 * 		'var' => 'Exemplo',
	 * 		'arrData' => [
	 * 			'name' => 'Zeindelf'
	 * 		]
	 * ];
	 *
	 * Você terá disponível na View do Smarty:
	 * - Uma variável chamada $var contendo a string 'Exemplo',
	 *   que será acessada lá por $var;
	 *
	 * - Um array chamado $arrData cujo índice $arrData['name'] é a string 'Zeindelf',
	 *   que será acessado lá por $arrData.name
	 *
	 * Isso vai evitar ter que usar o array principal $data, que tornaria a variável muito
	 * grande em caso de mais arrays dentro dele
	 *
	 * ----------------------------------------------------------------------------
	 * No parâmetro $partials, caso queira informar um header/footer diferente
	 * do padrão encontrado em /resources/views/templates/partials/geral, crie
	 * ele neste mesmo diretório e apenas informe seu nome em um array
	 *
	 * $partials = [
	 * 		'partial-header',
	 * 		'partial-footer'
	 * ];
	 *
	 * Índice [0] do array é para um Header e o índice [1] do array é para um Footer
	 *
	 * @param method 	$view 		Deve ser informado o método $this->template()
	 * @param array 	$data 		Array com os dados tratados pelo Model
	 * @param array 	$partials 	Header/Footer personalizado
	 * @return view
	 */
	protected function view($template, array $data = null, array $partials = null)
	{
		$arrData = ( $data ?: null );
		$arrPartials = ( $partials ?: null );

		return $this->view = new MainView($template, $arrData, $arrPartials);
	}

	/**
	 * Realiza os direcionamentos da aplicação
	 * A informação da barra inicial é facultativa
	 *
	 * @param string 	$path 		Nome da URI para onde deseja ser redirecionado
	 * @return redirect
	 */
	protected function redirect($path)
	{
		$path = strtolower(trim($path));

		if ( $path === 'index' || $path === '/index' ):
			$path = BASE_URL;
		elseif ( substr($path, 0, 1) === '/' ):
			$path = BASE_URL . $path;
		else:
			$path = BASE_URL . '/' . $path;
		endif;

		header('location: ' . $path);
		die();
	}

	/**
	 * Retorna o backtrace para setar o nome dos diretórios dos templates
	 * na classe MainView com base no método da classe em que foi chamada
	 *
	 * @return array
	 */
	protected function getTemplate()
	{
		return debug_backtrace();
	}
}