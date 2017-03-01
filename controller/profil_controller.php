<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:48
 */
require_once("Class/class_twig.php");

Class profil
{
    function index()
    {

        $twig = myTwig::create();

        echo $twig->render('profil.twig', [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS,
            'user' => [
                'nom' => 'Julien',
                'prenom' => 'Sobritz',
                'description' => 'Salut je m\'apelle julien et la je fait du front-end, et je sais taper au clavier sans le regarder'
            ]
        ]);

    }
}