<?php

/**
 * Gestion de la page d'erreur
 *
 * @param string $error
 * @return void
 */
function showErrors(string $error): void
{
    render($error);
}

/**
 * Gestion du rendu des erreurs
 *
 * @param string $view
 * @return void
 */
function render(string $view): void
{
    ob_start(); // buferise le contenu de la page

    require dirname(__DIR__) . '/view/errors/error' . $view . '.php';

    $content = ob_get_clean();

    require dirname(__DIR__) . '/view/base.php';
}
