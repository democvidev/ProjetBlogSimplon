<?php

require 'controller.php';


/**
 * Gestion de la page d'erreur
 *
 * @param string $error
 * @return void
 */
function showErrors(string $error): void
{
    $messages =[];
    render('errors/error404', $messages, $error);
}
