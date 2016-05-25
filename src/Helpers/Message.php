<?php

namespace Helpers;

use Core\Config;

/**
 * Classe para formatção de mensagens
 */
class Message
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Mensagem a ser exibida
	 *
	 * @var string
	 */
	private static $message;

	/**
	 * Classe CSS
	 *
	 * @var string
	 */
	private static $class;

	/**
	 * Seta a configuração das classes CSS
	 *
	 * @var string
	 */
	private static $type;

	/**
	 * Formatação do botão de fechamento do Bootstrap
	 *
	 * @var string
	 */
	private static $bootstrapButton = 	'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>';

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Mostra um bloco de mensagem na tela. Já formatado para o possível uso do Bootstrap
	 * No parâmetro $close, caso utilize o Bootstrap, informe a string 'bootstrap' para
	 * habilitar o botão de fechamento da caixa de mensagem
	 *
	 * @param string 	$type 		Informe 'success' | 'info' | 'warning' | 'danger'
	 * @param string 	$message 	Sua mensagem (pode usar formatção HTML)
	 * @param boolean 	$close 		Esconde/Mostra botão para fechar o bloco. Default: true
	 * @return string
	 */
	public static function get($type, $message, $close = true)
	{
		self::setType($type);

		self::$message = '<div class="alert ' . self::$type . '">';
		if ( $close === 'bootstrap' ):
			self::$message .= self::$bootstrapButton;
		elseif ( $close ):
			self::$message .= '<span class="alert-close"></span>';
		endif;
		self::$message .= $message;
		self::$message .= '</div>';

		return self::$message;
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Seta o tipo de mensagem
	 *
	 * @param string 	$type 		Decidida pelo método get()
	 * @return string
	 */
	private static function setType($type)
	{
		self::$class = Config::get('message');

		switch ( $type ):
			case 'success':
				self::$type = self::$class['success'];
				break;
			case 'info':
				self::$type = self::$class['info'];
				break;
			case 'warning':
				self::$type = self::$class['warning'];
				break;
			case 'danger':
				self::$type = self::$class['danger'];
				break;
			default:
				self::$type = null;
		endswitch;

		return self::$type;
	}
}