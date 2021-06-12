<?php

require_once 'controller.php';

/**
 * Gestion de l'inscription 
 *
 * @return void
 */
function register(): void
{
    $title = "Page d'inscription";
    $user = [];
    require dirname(__DIR__) . '/model/usersRepository.php';

    $errors = isValidForm($_POST);
    if ($errors !== []) {
        render('users/registerForm', $errors, $title);
        exit();
    }
    if (!empty($_POST)) {
        insertOne($_POST);
        redirect('index.php');
    }
    
    render('users/registerForm', $user, $title);
}

/**
 * Gestion de la page de connexion
 *
 * @return void
 */
function connect(): void
{
    $title = "Page Connexion";
    $user = [];
    render('users/connectionForm', $user, $title);
}
