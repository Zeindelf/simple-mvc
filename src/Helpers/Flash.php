<?php

namespace Helpers;

use Helpers\Message;
use Helpers\Session;

/**
 * Classe de Flash Messages
 * Leia a documentação da classe helper Message para mais informações
 */
class Flash
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Retorna uma mensagem de Sucesso (cor verde)
	 *
	 * @access public
	 * @param string 	$message 	Mensagem a ser exibida
	 * @param boolean 	$close 		Esconde/Mostra botão para fechar o bloco. Default: true
	 * @return string
	 */
	public static function success($message, $close = true)
	{
		$msg = Message::get('success', $message, $close);
		return self::set($msg);
	}

	/**
	 * Retorna uma mensagem de Informação (cor azul)
	 *
	 * @access public
	 * @param string 	$message 	Mensagem a ser exibida
	 * @param boolean 	$close 		Esconde/Mostra botão para fechar o bloco. Default: true
	 * @return string
	 */
	public static function info($message, $close = true)
	{
		$msg = Message::get('info', $message, $close);
		return self::set($msg);
	}

	/**
	 * Retorna uma mensagem de Aviso (cor amarelo)
	 *
	 * @access public
	 * @param string 	$message 	Mensagem a ser exibida
	 * @param boolean 	$close 		Esconde/Mostra botão para fechar o bloco. Default: true
	 * @return string
	 */
	public static function warning($message, $close = true)
	{
		$msg = Message::get('warning', $message, $close);
		return self::set($msg);
	}

	/**
	 * Retorna uma mensagem de Erro (cor vermelho)
	 *
	 * @access public
	 * @param string 	$message 	Mensagem a ser exibida
	 * @param boolean 	$close 		Esconde/Mostra botão para fechar o bloco. Default: true
	 * @return string
	 */
	public static function danger($message, $close = true)
	{
		$msg = Message::get('danger', $message, $close);
		return self::set($msg);
	}

	//------------------------------------------------------------
	//	PRIVATE METHODS
	//------------------------------------------------------------

	/**
	 * Registra a mensagem em uma sessão
	 *
	 * @access private
	 * @param string 	$message 	Mensagem a ser formatada
	 * @return session
	 */
	private static function set($message)
	{
		Session::set('flash', $message);
	}
}