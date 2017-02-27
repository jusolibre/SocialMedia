<?php
require 'vendor/autoload.php';
$page = 'index';

if (isset($_GET['p'])) {
   $page = $_GET['p'];
}

$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, [
    'debug' => true,
    'cache' => false,//__DIR__ . '/cache',
    'strict_variables' => true,
    'optimisations' => -1
]);

switch ($page) {
    case 'connection':
        echo $twig->render('connection.twig', [
            'logged' => true,
            'person' => [
            'Prenom' => 'julien',
            'Nom' => 'Sobritz'
        ]]);
        break;
    case 'profil':
        echo $twig->render('profil.twig', [
            'logged' => true,
            'person' => [
            'Prenom' => 'julien',
            'Nom' => 'Sobritz'
        ]]);
        break;
    case 'manage':
        echo $twig->render('manage.twig', [
            'logged' => true,
            'person' => [
            'Prenom' => 'julien',
            'Nom' => 'Sobritz'
        ]]);
        break;
    case 'search':
        echo $twig->render('search.twig', [
            'logged' => true,
            'person' => [
            'Prenom' => 'julien',
            'Nom' => 'Sobritz'
        ]]);
        break;
    case 'register':
        echo $twig->render('register.twig', [
            'logged' => true,
            'person' => [
            'Prenom' => 'julien',
            'Nom' => 'Sobritz'
        ]]);
        break;
    case 'complement':
        echo $twig->render('complement.twig', [
            'logged' => true,
            'person' => [
            'Prenom' => 'julien',
            'Nom' => 'Sobritz'
        ]]);
        break;
    case 'home':
        echo $twig->render('home.twig', [
            'logged' => true,
            'person' => [
                'Prenom' => 'julien',
                'Nom' => 'Sobritz'
        ]]);
        break;
    default:
        header('http/1.0 404 Not Found');
        echo $twig->render('404.twig', ['logged' => true]);
        break;
}

?>