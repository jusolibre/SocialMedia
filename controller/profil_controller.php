<?php
/**
 * Created by PhpStorm.
 * User: linuxboot34
 * Date: 27/02/17
 * Time: 16:48
 */
require_once("Class/class_twig.php");
require_once( SQL . "/model_user_class.php");

Class profil
{
    function renderPage($page) {

        $twig = myTwig::create();

        echo $twig->render($page , [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS,
            'friend' => 2,
            'userDisplay' => [
                'id' => 0,
                'nom' => 'DisplayJulien',
                'prenom' => 'DisplaySobritz',
                'description' => 'Salut je m\'apelle julien et la je fait du front-end, et je sais taper au clavier sans le regarder',
            'wall' => [
                0 => [
                    'user' => [
                        'id' => 0,
                        'prenom' => 'Julien',
                        'nom' => 'Sobritz',
                    ],
                    'message' => "premier message"
                ],
                1 => [
                    'user' => [
                        'id' => 1,
                        'prenom' =>'Vincent',
                        'nom' => 'Gérard'
                    ],
                    'message' => "Deuxieme message"
                ],
                2 => [
                    'user' => [
                        'id' => 2,
                        'prenom' => 'Brahim',
                        'nom' => 'Trop dur a écrire x)'
                    ],
                    'message' => "Troisieme message"
                ]
            ]
            ],
        ]);
        
    }

    function display($tab) {

        if (!isset($tab) || !isset($tab[0])) {
            $profil = new profil;
            $profil->index();
        }
        else {
            $user = new userDatabase();
        
            $data = [];
            $data['logged'] = $_SESSION["logged"];
            $data['root'] = WEBROOT;
            $data['asset'] = ASSET;
            $data['js'] = JS;
            $data['friend'] = $user->isFriend($_SESSION["id"], $tab[0]);
            $data['userDisplay'] = $user->getUserById($id);
            $data['wallDisplay'] = $user->getWall($tab[0]);
            $this->renderPage('display.twig');
        
        }
        
    }

    function index()
    {

        $twig = myTwig::create();

        echo $twig->render('profil.twig', [
            'logged' => $_SESSION["logged"],
            'root' => WEBROOT,
            'asset' => ASSET,
            'js' => JS,
            'friend' => 2,
            'user' => [
                'id' => 0,
                'nom' => 'Julien',
                'prenom' => 'Sobritz',
                'description' => 'Salut je m\'apelle julien et la je fait du front-end, et je sais taper au clavier sans le regarder'
            ],
            'wall' => [
                0 => [
                    'user' => [
                        'id' => 0,
                        'prenom' => 'Julien',
                        'nom' => 'Sobritz',
                    ],
                    'message' => "premier message"
                ],
                1 => [
                    'user' => [
                        'id' => 1,
                        'prenom' =>'Vincent',
                        'nom' => 'Gérard'
                    ],
                    'message' => "Deuxieme message"
                ],
                2 => [
                    'user' => [
                        'id' => 2,
                        'prenom' => 'Brahim',
                        'nom' => 'Trop dur a écrire x)'
                    ],
                    'message' => "Troisieme message"
                ]
            ]
        ]);

    }
}