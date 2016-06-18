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
     * Array contendo os valores
     *
     * @access protected
     * @var array
     */
    protected static $arr = [];

    //------------------------------------------------------------
    //  PUBLIC METHODS
    //------------------------------------------------------------

    /**
     * Seta o índice e o valor
     *
     * @access public
     * @param string    $key        Informe o nome do índice
     * @param mixed     $value      Informe o valor do índice
     * @return array
     */
    public static function set($key, $value)
    {
        return static::$arr[$key] = $value;
    }

    /**
     * Obtém o valor do índice informado
     * Separe por ponto '.' os índices do array para acessar seu valor
     *
     * @access public
     * @param string    $key        Informe o nome do índice para obtenção
     * @return mixed|null
     */
    public static function get($key)
    {
        if ( self::exists($key) ):
            $key = explode('.', $key);
            $array = self::$arr[$key[0]];
            unset($key[0]);

            foreach ( $key as $k ):
                $array = $array[$k];
            endforeach;

            return $array;
        else:
            echo '<b>N&atilde;o existe o &iacute;ndice informado no array.</b>';
            return false;
        endif;
    }

    /**
     * Retorna true se existir o índice
     * Separe por ponto '.' os índices do array para a verificação
     *
     * @access public
     * @param string    $key        Informe o nome do índice para verificação
     * @return bool
     */
    public static function exists($key)
    {
        $key = explode('.', $key);
        $array = self::$arr[$key[0]];
        unset($key[0]);

        foreach ( $key as $k ):
            if ( is_array(self::$arr) ):
                $array = $array[$k];
            else:
                return false;
            endif;
        endforeach;

        if ( !is_null($array) ):
            return true;
        else:
            return false;
        endif;
    }
}