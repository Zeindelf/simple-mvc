<?php

namespace Helpers;

use Core\Config;

/**
 * Classe de carregamento dos arrays de configurações
 */
class Load
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * String com o caminho para o diretório /app/Config
	 *
	 * @var string
	 */
	private $configDir;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Carrega as configurações
	 *
	 * @return configs
	 */
	public function __construct()
	{
		$this->setDir();
		require_once $this->configDir . 'Load.php';

		$this->set();
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Seta as configurações e faz o carregamento dos arquivos caso existam
	 *
	 * @return load file
	 */
	private function set()
	{
		$config = Config::get('load');
		$config = array_map('ucfirst', $config);

		$this->setDir();

		foreach ( $config as $load ):
			if ( file_exists($this->configDir . $load . '.php') ):
				require_once $this->configDir . $load . '.php';
			endif;
		endforeach;
	}

	/**
	 * Seta o caminho para o diretório /app/Config
	 *
	 * @return string
	 */
	private function setDir()
	{
		$this->configDir = APP_DIR . DS . 'Config' . DS;

		return $this->configDir;
	}
}