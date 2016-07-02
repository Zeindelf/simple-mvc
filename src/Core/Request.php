<?php

namespace Core;

/**
 * Classe para requisições do tipo $_GET e $_POST
 * Realiza o tratamento básico das requisições
 */
class Request
{
    //------------------------------------------------------------
    //  PUBLIC METHODS
    //------------------------------------------------------------

    /**
	 * Faz requisições do tipo $_GET. Se não for informado o nome do
	 * índice, será retornado um array com todos os valores
	 * Filtro padrão é sempre string
	 *
	 * @access public
	 * @param string 	$key 		Nome do índice desejado
	 * @param const 	$filter 	Constante reservada. Informe o tipo de filtro
	 * @return post
	 */
    public static function get($key = null, $filter = FILTER_DEFAULT)
    {
        if ($key === null) {
        	$get = filter_input_array(INPUT_GET, $filter);
        	if ( is_array($get) ) {
        		$get = array_map('trim', $get);
        		$get = array_map('strip_tags', $get);

            	return isset($get) ? $get : null;
            }
        }

        $get = filter_input(INPUT_GET, $key, $filter);
        $get = strip_tags(trim($get));

        return isset($get) ? $get : null;
    }

	/**
	 * Faz requisições do tipo $_POST. Se não for informado o nome do
	 * índice, será retornado um array com todos os valores
	 * Filtro padrão é sempre string
	 *
	 * @access public
	 * @param string 	$key 		Nome do índice desejado
	 * @param const 	$filter 	Constante reservada. Informe o tipo de filtro
	 * @return post
	 */
    public static function post($key = null, $filter = FILTER_DEFAULT)
    {
        if ($key === null) {
        	$post = filter_input_array(INPUT_POST, $filter);
        	if ( is_array($post) ) {
        		$post = array_map('trim', $post);
        		$post = array_map('strip_tags', $post);

            	return isset($post) ? $post : null;
            }
        }

        $post = filter_input(INPUT_POST, $key, $filter);
        $post = strip_tags(trim($post));

        return isset($post) ? $post : null;
    }
}