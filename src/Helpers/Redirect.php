<?php

namespace Helpers;

use App\Controllers\Error404Controller as Error404;

/**
 * Classe responsável pelos redirecionamentos HTTP
 */
class Redirect
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Armazena o nome da URI
	 *
	 * @var int|string
	 */
	private static $location;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Realiza o redirecionamento com base no que é informado no
	 * parâmetro $location. Se não for informado nada, o redirecionamento
	 * será para a página principal: dominio.com/
	 * Para erros específicos (403, 404, 502, etc.), basta informar o número
	 *
	 * @TODO: Fazer a implementação dos outros erros
	 *
	 * @param int|string|null 		$location 		URI
	 * @return redirect
	 */
	public static function to($location = false)
	{
		self::$location = $location;

		if ( self::$location ):
			if ( is_numeric(self::$location) ):

				switch ( self::$location ):
					case 404:
						return new Error404;
						break;
				endswitch;

			elseif ( self::$location === 'index' || self::$location === '/index' ):
				self::$location = BASE_URL;
			elseif ( substr(self::$location, 0, 1) === '/' ):
				self::$location = BASE_URL . self::$location;
			else:
				self::$location = BASE_URL . '/' . self::$location;
			endif;

		else:
			self::$location = BASE_URL;
		endif;

		header('Location: ' . self::$location);
		die();
	}
}