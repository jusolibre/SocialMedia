<?php

/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 28/02/17
 * Time: 08:05
 */
class myTwig
{
    public static function create()
    {
        $loader = new Twig_Loader_Filesystem(ROOT . 'templates');
        $twig = new Twig_Environment($loader, [
            'debug' => true,
            'cache' => false,//__DIR__ . '/cache',
            'strict_variables' => true,
            'optimisations' => -1
        ]);
        return $twig;
    }
}