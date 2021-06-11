<?php

require_once 'controller.php';


/**
 * Gestion de la page d'erreur
 *
 * @param string $error
 * @return void
 */
function showErrors(string $error): void
{
    $title = "Erreur 404";
    render('errors/error404', compact('error'), $title);
}
