<?php

namespace Helpers;

use Core\Config;

/**
 * Classe para formatação de mensagens
 * Também trabalha em conjunto com a classe helper Flash
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
	 * @access public
	 * @param string 	$type 		Informe 'success' | 'info' | 'warning' | 'danger'
	 * @param string 	$message 	Sua mensagem (pode usar formatção HTML)
	 * @param boolean 	$close 		Esconde/Mostra botão para fechar o bloco. Default: true
	 * @return string
	 */
	public static function get($type, $message, $close = true)
	{
		self::setType($type);
		if ( self::$type ) {
			self::$message = '<div class="alert ' . self::$type . '">';
			if ( $close === 'bootstrap' ) {
				self::$message .= self::$bootstrapButton;
			} else {
				if ( $close ) {
					self::$message .= '<span class="alert-close"></span>';
				}
			}
			self::$message .= $message;
			self::$message .= '</div>';

			return self::$message;
		} else {
			echo '<b>O tipo de mensagem informado n&atilde;o existe. Utilize algum destes:
					<ul>
						<li>success</li>
						<li>info</li>
						<li>warning</li>
						<li>danger</li>
					</ul>
				</b>';

			return false;
		}
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Seta o tipo de mensagem
	 *
	 * @access private
	 * @param string 	$type 		Decidida pelo método get()
	 * @return string
	 */
	private static function setType($type)
	{
		switch ( $type ) {
			case 'success':
				self::$type = Config::get('class.success');
				break;
			case 'info':
				self::$type = Config::get('class.info');
				break;
			case 'warning':
				self::$type = Config::get('class.warning');
				break;
			case 'danger':
				self::$type = Config::get('class.danger');
				break;
			default:
				self::$type = false;
		}

		return self::$type;
	}
}