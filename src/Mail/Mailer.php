<?php

namespace Mail;

use Core\Config;
use Core\MainView;

/**
 * Classe de envio de e-mails utilizando a classe PHPMailer
 */
class Mailer extends MainView
{
	//------------------------------------------------------------
	//	PROPERTIES
	//------------------------------------------------------------

	/**
	 * Contém a instância do PHPMailer
	 *
	 * @access private
	 * @var object
	 */
	private $mailer;

	/**
	 * Contém a instância da classe Message
	 *
	 * @access private
	 * @var object
	 */
	private $message;

	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Inicia e configura o PHPMailer, o Smarty para os templates
	 * de e-mails e a classe de Mensagens
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		$this->mailer = new \PHPMailer;

		$this->mailer->isSMTP();
		$this->mailer->Host = Config::get('mail.host');
		$this->mailer->Port = Config::get('mail.port');
		$this->mailer->Username = Config::get('mail.username');
		$this->mailer->Password = Config::get('mail.password');
		$this->mailer->SMTPAuth = Config::get('mail.auth');
		$this->mailer->SMTPSecure = Config::get('mail.secure');

		$this->mailer->isHTML(Config::get('mail.html'));
		$this->mailer->CharSet = Config::get('mail.charset');

		$this->smartyInit();
		$this->message = new Message($this->mailer);
	}

	/**
	 * Dados de quem está enviando o e-mail e o e-mail para resposta
	 *
	 * @access public
	 * @param string 	$address 		Endereço de e-mail do remetente
	 * @param string 	$name  			Nome do remetente
	 * @param string 	$replyTo 		Endereço de e-mail que receberá a resposta
	 * @return void
	 */
	public function from($address = null, $name = null, $replyTo = null)
	{
		$this->message->from($address, $name);
		$this->message->replyTo($replyTo);
	}

	/**
	 * Envia o e-mail
	 *
	 * @access public
	 * @param string 	$template 		Nome do template que contém a mensagem formatada
	 * @param string 	$to 			Destinatário
	 * @param string 	$subject 		Assunto do e-mail
	 * @param array 	$data 			Dados a serem inseridos no template
	 * @return boolean
	 */
	public function send($template, $to, $subject, array $data = [])
	{
		$this->view->assign('data', $data);
		$this->message->body($this->view->fetch(SMARTY_EMAIL . $template . '.tpl'));

		$this->message->to($to);
		$this->message->subject($subject);

		if ( $this->mailer->Send() ) {
			return true;
		}

		return false;
	}
}