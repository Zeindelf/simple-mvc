<?php

namespace Mail;

use Core\Config;

class Message
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Contém a instância do PHPMailer
	 *
	 * @var object
	 */
	protected $mailer;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Recebe a instância do PHPMailer da classe Mailer
	 *
	 * @param object 	$mailer 	Instância do PHPMailer
	 * @return void
	 */
	public function __construct(\PHPMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	/**
	 * Endereço de e-mail do remetente
	 *
	 * @param string 	$address 	Endereço de e-mail
	 * @param string 	$name 		Nome do remetente
	 * @return void
	 */
	public function from($address = null, $name = null)
	{
		$this->mailer->From = ( $address ?: Config::get('mail.from.address') );
        $this->mailer->FromName = ( $name ?: Config::get('mail.from.name') );
	}

	/**
	 * Endereço de e-mail do destinatário
	 *
	 * @param string 	$address 	Endereço de e-mail
	 * @return void
	 */
	public function to($address)
	{
		$this->mailer->addAddress($address);
	}

	/**
	 * Assunto do e-mail
	 *
	 * @param string 	$subject 	Assunto do e-mail
	 * @return void
	 */
	public function subject($subject)
	{
		$this->mailer->Subject = $subject;
	}

	/**
	 * Mensagem do e-mail. Recebe um template formatado pelo Smarty
	 *
	 * @param string 	$body 	Mensagem do e-mail
	 * @return void
	 */
	public function body($body)
	{
		$this->mailer->Body = $body;
	}

	/**
	 * E-mail para onde o destinatário irá enviar a resposta
	 *
	 * @param string 	$address 	Endereço do e-mail de resposta
	 * @return void
	 */
	public function replyTo($address)
	{
		$address = ( $address ?: $this->mailer->addReplyTo(Config::get('mail.from.address')) );

		$this->mailer->addReplyTo($address);
	}
}