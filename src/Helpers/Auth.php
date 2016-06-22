<?php

namespace Helpers;

use Core\Config;
use Core\Redirect;

use Helpers\Flash;
use Helpers\Session;

/**
 * Classe para restringir o acesso dos usuários
 * Comumente usada nos Controllers
 */
class Auth
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Redireciona o usuário conforme o status passado e o tipo
	 * de sessão ativa
	 *
	 * 'guest': 	Usuário não logado. Não tem acesso onde é informado
	 * 				É retornado para 404
	 * 'logged': 	Usuário já está logado no sistema
	 * 				Restringe acesso a páginas como /login e /register
	 * 'denied': 	Usuário necessita estar logado no sistema
	 * 				É redirecionado à página de /login com aviso
	 * 'private': 	Privado. Restringe o acesso de todos mandando para 404
	 *
	 * Parâmetro $status informado errado é retornado para 404
	 *
	 * @access public
	 * @param string 	$status 	'guest' | 'logged' | 'denied'
	 * @return redirect
	 */
	public static function user($status)
	{
		switch ( $status ):
			// Visitante
			case 'guest':
				if ( !Session::exists(Config::get('session.user')) ):
					return Redirect::to(404);
				endif;
				break;

			// Logado
			case 'logged':
				if ( Session::exists(Config::get('session.user')) ):
					return Redirect::to();
				endif;
				break;

			// Negado
			case 'denied':
				if ( !Session::exists(Config::get('session.user')) ):
					$message = '<p>Por favor, logue-se para acessar esta área.</p>';
					Flash::warning($message);

					return Redirect::to('login');
				endif;
				break;

			// Privado
			case 'private':
				return Redirect::to(404);
				break;

			default:
				return false;
		endswitch;
	}
}