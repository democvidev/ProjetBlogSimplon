<?php

require_once 'controller.php';

function register()
{
    // var_dump($_POST); die;
    $title = "Page d'inscription";
    require dirname(__DIR__) . '/model/usersRepository.php';

    // $users = [];
    $errors = isValidForm($_POST);
    if (!empty($_POST)) {
        insertOne($_POST);
        redirect('index.php');
    }
    
    render('users/registerForm', $errors, $title);
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
