<?php

namespace Helpers;

/**
 * Verifica requisições Http
 */
class Http
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Verifica se o usuário está vindo da página certa
	 *
	 * @access public
	 * @param string 	$refererUrl 	Uri de origem (após a index, sem barra '/' inicial)
	 * @return mix
	 */
	public static function checkReferer($refererUrl)
	{
		if ( BASE_URL . '/' . $refererUrl === self::referer() ):
			return true;
		endif;

		return false;
	}

	/**
	 * Verifica a existência da super global $_SERVER
	 *
	 * @access private
	 * @return mix
	 */
	public static function referer()
	{
		//return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
		$server = filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_VALIDATE_URL);

		return isset($server) ? $server : null;
	}
}