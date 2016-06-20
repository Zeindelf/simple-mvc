<?php

namespace Helpers;

use Core\Config;

/**
 * Classe para encriptar senhas
 */
class Hash
{
	//------------------------------------------------------------
	//	PUBLIC METHODS
	//------------------------------------------------------------

	/**
	 * Realiza o hash de senhas
	 *
	 * @access public
	 * @param string 	$password 		Senha a ser encriptada
	 * @return string
	 */
	public static function set($password)
	{
		return password_hash(
			$password,
			Config::get('hash.algo'),
			['cost' => Config::get('hash.cost')]
		);
	}

	/**
	 * Verifica se uma senha é válida
	 *
	 * @access public
	 * @param string 	$password 		Senha sem criptografia a ser conferida
	 * @param string 	$hash 			Senha encriptada
	 * @return string
	 */
	public static function check($password, $hash)
	{
		return password_verify($password, $hash);
	}

	public static function hash($item)
	{
		return hash('sha256', md5(sha1($item), true));
	}

	/**
	 * Gera uma criptografia randômica de até 128 caracteres
	 *
	 * @access public
	 * @param int 		$length 	Tamanho do hash
	 * @return string
	 */
	public static function randomHash($length = null)
	{
		switch ( $length ):
			case 8:
				return hash('crc32', uniqid(rand(), true));
				break;

			case 16:
				$first = hash('crc32', uniqid(rand(), true));
				$second = hash('crc32b', uniqid(rand(), true));

				return $first . $second;
				break;

			case 32:
				return hash('md5', uniqid(rand(), true));
				break;

			case 64:
				return hash('sha256', uniqid(rand(), true));
				break;

			case 128:
				return hash('sha512', uniqid(rand(), true));
				break;

			default:
				echo '<b>Informe a quantidade de caracteres: 8, 16, 32, 64 ou 128</b>';
		endswitch;
	}

	/**
	 * Gera uma string randômica de quantos caracteres forem informados
     *
     * @access public
     * @param int 		$length 	Tamanho da string
     * @return string
     */
    public static function randomString($length)
    {
        $keys = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
		$seed = implode($keys);

		$max = strlen($seed) - 1;
		$string = '';

		for ( $i = 0; $i < $length; ++$i ):
		    $string .= $seed[mt_rand(0, $max)];
		endfor;

        return $string;
    }

    /**
	 * Gera um número randômico de quantos dígitos forem informados
     *
     * @access public
     * @param int 		$length 	Tamanho do número
     * @return string
     */
    public static function randomNumber($length)
    {
        $keys = range(0, 9);
		$seed = implode($keys);

		$max = strlen($seed) - 1;
		$string = '';

		for ( $i = 0; $i < $length; ++$i ):
		    $string .= $seed[mt_rand(0, $max)];
		endfor;

        return $string;
    }
}