<?php

namespace Core;

use Core\Config;

/**
 * Cria alias para as classes utilizadas na view
 */
class Aliases
{
    /**
     * Inicia todos aliases
     * Na view com Smarty, apenas informe o nome da classe e o método estático
     * -- {assign var=message value=Message::get('success', 'Uma mensagem qualquer')}
     *
     * @return namespace
     */
    public static function init()
    {
        $classes = Config::get('classAliases');

        foreach ( $classes as $classAlias => $className ):
            $classAlias = '\\' .ltrim($classAlias, '\\');

            class_alias($className, $classAlias);
        endforeach;
    }
}