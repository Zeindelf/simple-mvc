<?php

namespace Helpers;

use Core\Config;
use Core\Redirect;
use Core\Request;

/**
 * Classe para gerar um token para proteção contra CSRF
 */
class Csrf
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Gera o token e armazena na sessão
	 *
	 * @access public
	 * @return session
	 */
	public static function generate()
	{
		if ( !Session::exists(Config::get('session.token')) ):
			$token = md5(uniqid(rand()));
			Session::set(Config::get('session.token'), $token);
		endif;

		$token = Session::get(Config::get('session.token'));
		$tokenName = Config::get('html.tokenName');

		return '<input type="hidden" name="' . $tokenName . '" value="' . $token . '">';
	}

	/**
	 * Verifica se o token é válido
	 *
	 * @access public
	 * @param string 		$sessionDataName 	Nome da sessão que armazerá os dados
	 * @param string|int 	$redirectTo 		Local para onde será redirecionado em caso de falha
	 * @return mix
	 */
	public static function check($sessionDataName, $redirectTo)
	{
		$sessionToken = Session::get(Config::get('session.token'));
		$token = Request::post(Config::get('session.token'));

		if ( $sessionToken === $token ):
			Session::set($sessionDataName, Request::post());
			Session::delete(Config::get('session.token'));

			return true;
		else:
			// CSRF message
			Flash::danger(Config::get('message.csrf'));

			return Redirect::to($redirectTo);
		endif;
	}
}