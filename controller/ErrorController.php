<?php

namespace App\Controller;

use App\Controller\AbstractController;

// require_once 'AbstractController.php';

class ErrorController extends AbstractController
{
    /**
     * Gestion de la page d'erreur
     *
     * @param string $error
     * @return void
     */
    public function showErrors(string $error): void
    {
        $title = "Erreur 404";
        $this->render('errors/error404', compact('error'), $title);
    }
}
