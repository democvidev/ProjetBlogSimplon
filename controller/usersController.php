<?php

require 'controller.php';


/**
 * Gestion de la page de connexion
 *
 * @return void
 */
function connect(): void
{ 
    $title = "Page Connexion";
    $users = [];
    render('users/connectionForm', $users, $title);
}

