<?php

namespace Core;

/**
 * Classe para setar configurações
 */
class Config
{
    //------------------------------------------------------------
    //  PROPERTIES
    //------------------------------------------------------------

    /**
     * @access protected
     * @var array
     */
    protected static $settings = array();

    //------------------------------------------------------------
    //  PUBLIC METHODS
    //------------------------------------------------------------

    /**
     * Retorna true se existir o índice
     *
     * @access public
     * @param string    $key        Informe o nome do índice para verificação
     * @return bool
     */
    public static function exists($key)
    {
        return isset(static::$settings[$key]);
    }

    /**
     * Obtém o valor do índice
     *
     * @access public
     * @param string    $key        Informe o nome do índice para obtenção
     * @return mixed|null
     */
    public static function get($key)
    {
        return isset(static::$settings[$key]) ? static::$settings[$key] : null;
    }

    /**
     * Seta o valor do índice
     *
     * @access public
     * @param string    $key        Informe o nome do índice
     * @param mixed     $value      Informe o valor do índice
     */
    public static function set($key, $value)
    {
        static::$settings[$key] = $value;
    }
}
